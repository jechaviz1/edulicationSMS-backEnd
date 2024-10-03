_.extend(Backbone.Model.prototype, Backbone.Validation.mixin);
_.extend(Backbone.Model.prototype, Backbone.Validation.mixin);

//Taxes
var Tax = Backbone.Model.extend({
    initialize: function(attributes) {
        if (!attributes.index) {
            attributes.index = taxes.taxIndex++;
        }

        if (!attributes.name) {
            attributes.name = 'Tax ' + attributes.index;
        }

        if (!attributes.val) {
            attributes.val = 0;
        }
        this.set(attributes);
		
        this.taxView = new TaxView(this);
        this.taxView.render();
        $('.tax-list').append($('<li>').data('tax', this).html('<a href="#" class="tax-item btn-small btn-link">' + this.get('name') + '</a></li>'));
        this.on('change:val', function() {
            invoiceItems.each(function(iitem) {
                iitem.calculateSubtotal();
            });
        });
        var _thisTax = this;
        this.on('change:name', function() {
            $('.tax-list li').each(function() {
                if ($(this).data('tax') === _thisTax) {
                    $(this).find('a').text(_thisTax.get('name'));
                }
            });
            $('.selected-tax').each(function() {
                if ($(this).data('tax') === _thisTax) {
                    $(this).text(_thisTax.get('name'));
                }
            });

            var index = _thisTax.get('index');
            $('#TotalsSection').find('.tax-' + index + ' .title').text(_thisTax.get('name'));

        });
        this.on('change', taxes.serialize, taxes);
    }
});
var taxesTable = $('#taxesContainer table');
var compiledTaxesTemplate = _.template(document.getElementById('taxRowTemplate').innerHTML);
var TaxCollection = Backbone.Collection.extend({
    model: Tax, taxIndex: 0,
    lKey: 'taxes-' + window.localStorage.qi_key,
    initialized: false,
    initialize: function() {
        
        this.on('add', this.showHideColumns);
        this.on('remove', function(tax) {
            invoiceItems.each(function(iitem) {
                if (iitem.has('tax1') && iitem.get('tax1') === tax) {
                    iitem.unset('tax1');
                }

                if (iitem.has('tax2') && iitem.get('tax2') === tax) {
                    iitem.unset('tax2');
                }
            });
            $('.tax-list li').each(function() {
                if ($(this).data('tax') === tax) {
                    $(this).remove();
                }
            });
            this.showHideColumns();
        });
    },
    showHideColumns: function() {
        if (!this.length) {
            $('.tax1-header,.tax2-header,.tax-container').hide();
            $('.wide-cell').attr({colspan: 2});
        } else if (this.length === 1) {
            $('.tax1-header,.tax1-container').show();
            $('.tax2-header,.tax2-container').hide();
            $('.wide-cell').attr({colspan: 3});
        } else {
            $('.tax1-header,.tax2-header,.tax-container').show();
            $('.wide-cell').attr({colspan: 4});
        }

        this.serialize();
    },
    serialize: function() {
        if (this.initialized) {
            
            window.localStorage[this.lKey] = JSON.stringify(this.toJSON());
        }
    },
    preload: function() {
        if (window.localStorage[this.lKey] && is_pre_filled == 'false') {
            
            this.reset(JSON.parse(window.localStorage[this.lKey]));
        }

        this.initialized = true;
    }
});
var taxes = new TaxCollection();

var TaxView = Backbone.View.extend({
    model: Tax,
    tagName: 'tr',
    className: 'tax-row',
    initialize: function(tax) {
        this.tax = tax;
        this.$el.data('tax', tax);
    },
    events: {
        'click .remove-tax': function() {
            taxes.remove(this.tax);
            this.$el.remove();
            return false;
        },
        'change [data-var="val"]': function(evt) {
            this.tax.set('val', evt.currentTarget.value);
        },
        'change [data-var="name"]': function(evt) {
            this.tax.set('name', evt.currentTarget.value);
        }
    },
    render: function() {
        this.$el.html(compiledTaxesTemplate(this.tax.toJSON()));
		if($(this.$el[0]).attr('name')!='[No Tax]')
		{
			taxesTable.append(this.$el);
			this.$(':input:first').focus();
		}
        
    }
});
var noTax= new Tax({name:'[No Tax]',val:0});
//Items
var Item = Backbone.Model.extend({
    initialize: function(attributes) {
        this.set(attributes);
//		invoiceItems.add(this);
        this.calculateSubtotal();
        this.on('change', this.calculateSubtotal);
        this.listenTo(invoice, 'change:discount', this.calculateSubtotal);
        this.listenTo(invoice, 'change:flat_discount', this.calculateSubtotal);
		this.listenTo(invoice, 'change:paid', this.calculateSubtotal);
        this.redraw();
    },
    calculateSubtotal: function() {
        var qty = this.get('qty'); //parseInt(this.get('qty'));
        var unit_price = this.get('unit_price'); //parseFloat(this.get('unit_price'));
        var subtotal = qty * unit_price;
        var total = subtotal;

        if (invoice.has('discount') && invoice.get('discount') > 0) {
            var discount = (invoice.get('discount') / 100) * subtotal;
            this.set('discount', discount);
            total -= discount; //*= (1 - invoice.get('discount')) * 100;
        } else {
            this.set('discount', 0);
        }

        var tax1Value = 0;
        if (this.has('tax1')&&this.get('tax1').get('val')>0) {
            
            tax1Value = total * this.get('tax1').get('val') / 100;
            this.set({tax1_value: tax1Value});
        }

        var tax2Value = 0;
        if (this.has('tax2')&&this.get('tax2').get('val')>0) {
            tax2Value = total * this.get('tax2').get('val') / 100;
            this.set({tax2_value: tax2Value});
        }

        total += tax1Value + tax2Value;

        this.set('subtotal', subtotal);
        this.set('total', total);
        if (this.viewObj) {
            this.viewObj.$el.find('[data-key=subtotal]').text(format_price(subtotal, invoice.get('currency')));
        }
        invoice.calculateTotals();
    },
    redraw: function() {
        if (!this.viewObj) {
            this.viewObj = new ItemView(this);
        }
        this.viewObj.render();
    }
});
var ItemView = Backbone.View.extend({
    tagName: 'tr',
    className: 'item-row',
    template: _.template(document.getElementById('itemRow').innerHTML),
    initialize: function(iitem) {
        this.invoiceItem = iitem;
    },
    events: {
        'click .remove-item': function() {
            if (invoiceItems.length > 1) {
                invoiceItems.remove(this.invoiceItem);
            }
        },
        'click .tax-item': function(event) {
            event.preventDefault();
            var tax = $(event.currentTarget).parent().data('tax');
            
			
            var key = $(event.currentTarget).parents('td')
                    .find('.selected-tax')
                    .data('tax', tax)
                    .text(tax.get('name'))
                    .end()
                    .data('item-key');
					
					 
            this.invoiceItem.set(key, tax);
        },
        'change .editable': function(event) {
			
            var $this = $(event.currentTarget);
			
            var key = $this.data('key');
			
			if(key=='unit_price'||key=='qty')
				$this.val($this.val().replace(/[^\d.-]/g,'')); 

            this.invoiceItem.set(key, $this.val());
        }
    },
    render: function() {
        this.$el.html(this.template(this.invoiceItem.toJSON()));
        this.$el.data('invoice-item', this.invoiceItem);
        var $el = this.$el;
		var xxxx=0;
        taxes.each(function(tax) {
			xxxx++;
            $el.find('.tax-list').append($('<li>').data('tax', tax).html('<a href="#" class="tax-item btn-small btn-link">' + tax.get('name') + '</a></li>'));
        });
		
		
		
		
		if(xxxx>0)
		$el.find('.tax-list').append($('<li>').data('tax', noTax).html('<a href="#" class="tax-item btn-small btn-link">' + '[NO TAX]' + '</a></li>'));

        $('#ItemsTable').append(this.$el);
        this.setTaxes();
        taxes.showHideColumns();
        this.delegateEvents();
    },
    setTaxes: function() {

        var $el = this.$el;
        if (this.invoiceItem.has('tax1')) {
            var tax1_data = this.invoiceItem.get('tax1');
            var tax1 = this.invoiceItem.get('tax1').get('name');
            $el.find('.tax1-container .tax-list li').each(function() {
                if ($(this).data('tax').get('name') === tax1) {
                    $el.find('.tax1-container .selected-tax').data('tax', tax1_data).text(tax1_data.get('name'));
                }
            });
        } else if (this.invoiceItem.has('tax1_name')) {
            
            var tax1 = this.invoiceItem.get('tax1_name');
            
            
            $el.find('.tax1-container .tax-list li').each(function() {
               
                
                if ($(this).data('tax').get('name') === tax1) {
                    $el.find('.tax1-container .selected-tax').data('tax', $(this).data('tax')).text($(this).data('tax').get('name'));
                }
            });
             
             
            invoiceItems.each(function(iitem) {
                iitem.calculateSubtotal();
            });
			invoice.calculateTotals();
        }

        if (this.invoiceItem.has('tax2')) {
            var tax2 = this.invoiceItem.get('tax2');
            this.$el.find('.tax2-container .tax-list li').each(function() {
                if ($(this).data('tax') === tax2) {
                    $el.find('.tax2-container .selected-tax').data('tax', tax2).text(tax2.get('name'));
                }
            });
        } else if (this.invoiceItem.has('tax2_name')) {
            
            var tax1 = this.invoiceItem.get('tax1_name');
            
            $el.find('.tax2-container .tax-list li').each(function() {
                
                
                if ($(this).data('tax').get('name') === tax1) {
                    $el.find('.tax2-container .selected-tax').data('tax', $(this).data('tax')).text($(this).data('tax').get('name'));
                }
            });

        }
    }

});
var ItemsCollection = Backbone.Collection.extend({
    model: Item,
    initialize: function() {
        this.on('remove', function(iitem) {
            iitem.viewObj.$el.remove();
            invoice.calculateTotals();
        });
        this.listenTo(taxes, 'remove', function(tax) {
            this.each(function(iitem) {
                if (iitem.has('tax1') && iitem.get('tax1') === tax) {
                    iitem.unset('tax1');
                }

                if (iitem.has('tax2') && iitem.get('tax2') === tax) {
                    iitem.unset('tax2');
                }
            });
        });
    }
});
//var itemsTemplate = document.getElementById('itemsTable').innerHTML;
//Invoice
var totalsView;
var Invoice = Backbone.Model.extend({
    validation: {
        business_email: {
            pattern: 'email',
            required: true,
            msg: 'Valid email required'
        },
        client_email: {
            pattern: 'email',
            required: true,
            msg: 'Valid email required'
        },
/*         email_subject: {
            required: true,
            msg: 'Required'
        }
		,
        email_message: [{
                required: true,
                msg: 'Message Required'
            }, {
                maxLength: 750,
                msg: 'Only {1} characters allowed'
            }]
			, */
        payment_user: {
            required: function() {
                return invoice.get('payment_method');
            },
            msg: 'Required'
        }
    },
    url: SITE_ROOT + '/invoices/save_invoice',
    initialize: function(attributes) {
	
	invoiceItems.each(function(iitem) {
                        iitem.calculateSubtotal();
                    });
        this.set(attributes);
        this.on('change:template_id', function() {
            var template_id = this.get('template_id');
            if (template_id) {
                this.loadTemplate(template_id);
            } else {
                errorMessage('Invalid template');
            }
        });
        this.on('change', function(model) {
            _.each(model.changed, function(data, key) {
                extraFieldsRender();
                if (key !== 'template_id') {
                    if ($('#' + key).hasClass('invoice-input')) {
                        $('#' + key).val(data);
                    } else {
                        $('#' + key).text(data);
                    }
                }
            });
        });
        this.on('change:currency', function() {
            $('[data-var=currency]').text(this.get('currency'));
			invoiceItems.each(function(iitem) {
                iitem.calculateSubtotal();
            });
			invoice.calculateTotals();
			
        });
        this.on('validated', function(valid, model, errors) {
            if (valid) {

            } else {
                this.invalidate(errors);
            }
        });
    },
    loadTemplate: function(template_id) {
		
		//invoice.attributes.extra=$('#extra_editor').html();
        var _this = this;
        $.ajax({
            url: SITE_ROOT + 'load-template/' + template_id, dataType: 'json',
            success: function(data) {
                if (data.error) {
                    errorMessage(data.message);
                } else {



                    var invoiceTemplate = _.template(data.template_html);

                    var newTpl = $(invoiceTemplate(_this.attributes));

                    newTpl.find('.editable-area').not('img').replaceWith(function() {
                        var _this = this;
                        var content = $(_this).html();
                        var rows = content.split("\n").length + 1;
                        return $('<textarea></textarea>', {id: _this.id, 'rows': rows, 'class': 'invoice-input'}).val(content);

                        
                    });
                    newTpl.find('.editable-text').replaceWith(function() {
                        var _this = this;
                        var content = $(_this).html();

                        return $('<input />', {type: 'text', id: _this.id, value: content, 'class': 'invoice-input'});
                    });

                    setTimeout(function() {
                        newTpl.find('textarea').autosize();
                    }, 1000);
                    $('#templateArea').html(newTpl);
                    invoiceItems.each(function(iitem) {
                        iitem.redraw();
                    });
                    taxes.showHideColumns();
                    _this.calculateTotals();
                    if (!totalsView) {
                        totalsView = new TotalsView({model: _this});
                    }
                    totalsView.render();
                    setLogoEditor();
                    justifyStyle();
                    extraFieldsRender();
					if(invoice.attributes.show_balance_due==1)
					activateBalanceDue();
						else
					deactivateBalanceDue();

                    $('.template-loading').button('reset');
					if (typeof advancedEdit == 'function') { 
						tinyMCE.editors=[];
						advancedEdit(); 
					}
					
                }
            }
        });
    },
    calculateTotals: function() {
        var total = 0;
		var paid = 0;
		var unpaid = 0;
        var subtotal = 0;
        var invoiceTaxes = {};
        var taxes = 0;
        var invoiceDiscount = 0;
        if (!invoiceItems) {
            return false;
        }
        invoiceItems.each(function(iitem) {
            total += iitem.get('total');
            subtotal += iitem.get('subtotal');
            if (iitem.has('tax1')&&iitem.get('tax1_value')>0) {
                var tax = iitem.get('tax1');
                if (!invoiceTaxes[tax.get('name')]) {
                    invoiceTaxes[tax.get('name')] = {val: 0, index: tax.get('index')};
                }
                invoiceTaxes[tax.get('name')].val += iitem.get('tax1_value');
            }

            if (iitem.has('tax2')&&iitem.get('tax2_value')>0) {
                var tax = iitem.get('tax2');
                if (!invoiceTaxes[tax.get('name')]) {
                    invoiceTaxes[tax.get('name')] = {val: 0, index: tax.get('index')};
                }
                invoiceTaxes[tax.get('name')].val += iitem.get('tax2_value');
            }

            if (iitem.has('discount')) {

                invoiceDiscount += iitem.get('discount');
            }


        });

        if (invoice.has('flat_discount') && invoice.get('flat_discount') > 0 && invoice.get('discount') == 0)
        {
            invoiceDiscount = invoice.get('flat_discount');
            total = total - invoiceDiscount;
        }
		
		if (invoice.has('paid') && invoice.get('paid') > 0)
        {
			paid = invoice.get('paid');
        }
		
		unpaid = total - paid; 

        this.set({total: total, taxes: invoiceTaxes, subtotal: subtotal, discount_val: invoiceDiscount, paid: paid, unpaid: unpaid });
    },
    invalidate: function(errors) {

        $('.control-group').removeClass('error').find('.help-block.error-message').remove();
        var first = true;
        _(errors).each(function(msg, index) {
            var $el = $('[name=' + index + ']');
            if (first) {
                $el.focus();
                first = false;
            }
            $('<span>').addClass('help-block error-message').text(msg).insertAfter($el);
            $el.parents('.control-group').addClass('error');
            var tabPanel = $el.parents('.tab-pane');
            if (tabPanel.length) {
                $('a[href=#' + tabPanel.attr('id') + ']').addClass('error-tab text-error');
            }
        });

    }
});

var invoiceAttribes = {
    no: '2001321',
    date: new Date().toLocaleDateString(),
    field1_value: '',
    field2_value: '',
    field3_value: '',
    field4_value: '',
    field5_value: '',
    field6_value: '',
    field7_value: '',
    field8_value: '',
    field9_value: '',
    field10_value: '',
    business_info: '[Business Name]\n[Business Address 1]\n[City], [State] [Postal Code]\n[Company Phone Number]\n[Company Emaill Address]',
    business_email: '',
    client_info: "[Client Name]\n[Client Address line 1]\n[City], [State] [Postal Code]",
    client_email: '',
    client_telephone: '',
    logo: SITE_ROOT + 'default-logo.png',
    logo_height: 102,
    logo_width: 122,
    extra: 'Invoice',
    notes: 'Enter your Notes, Bank Details, or Terms',
    email_subject: '',
    email_message: $('#sendMessage').val(),
    currency: invoice_currency
};

_(invoiceLabels).each(function(value, key) {
    invoiceAttribes['label_' + key] = value;
});
var invoiceItems = new ItemsCollection;

var invoice = new Invoice($.extend( invoiceAttribes, prefilled_invoice )); 



var TotalsView = Backbone.View.extend({
    $el: null,
    colspan: 2,
    initialize: function() {
        this.listenTo(invoice, 'change', this.updateTotal);
        this.updateColspan();
        this.listenTo(taxes, 'add', this.updateColspan);
        this.listenTo(taxes, 'remove', this.updateColspan);
//		this.listenTo(invoice, 'change:currency', this.updateTotal);
        this.$el = null;
    },
    render: function() {

        this.updateTotal();
    },
    updateTotal: function(model) {
        var run = true;
        if (model) {
            _.each(model.changed, function(value, key) {
                if (key.match(/^label_/)) {
                    run = false;
                }
            });
        }

        if (!run) {
            return;
        }
        this.$el = $('#TotalsSection');

        var $subtotalEl = this.$('#SubtotalRow');

        $subtotalEl.find('#subtotal').text(format_price(invoice.get('subtotal'), invoice.get('currency')));
        var total = invoice.get('total');
        var subtotal = invoice.get('subtotal');



        var discount = invoice.get('discount_val');
        if (discount) {
            var $discountEl = this.$('.discount-val');
            if (!$discountEl.length) {
                $discountEl = $('<tr>', {'class': 'totals-row discount-val'});
                $subtotalEl.after($discountEl);
            }
            if (!$discountEl.html()) {
                $discountEl.html('<td class="wide-cell" colspan="' + this.colspan + '"></td><td><strong><input type="text" class="invoice-input" id="label_discount" value="' + invoice.get('label_discount') + '" /> </strong></td><td colspan="2"><strong id="discountVal">' + '-' + format_price(discount, invoice.get('currency')) + '</strong></td>');
            } else {
                $discountEl.find('#discountVal').text(format_price(discount, invoice.get('currency')));
            }
        } else {
            this.$('.discount-val').remove();
        }


        var $totalEl = $('#TotalRow');
        $totalEl.find('#total').text(format_price(invoice.get('total'), invoice.get('currency')));
		
		
		$('#unpaid').text(format_price(invoice.get('unpaid'), invoice.get('currency')));

        if (total == subtotal)
            $subtotalEl.hide();
        else
            $subtotalEl.show();





        var taxes = invoice.get('taxes');
        this.$el.find('[class^=tax-]').remove();
        if (_.size(taxes)) {
            _.each(taxes, function(val, key) {
				if(key!='[No Tax]')
				{
					var taxHtml = '<td class="wide-cell" colspan="' + this.colspan + '"><td><strong class="title">' + key + '</strong></td><td colspan="2">' + format_price(val.val, invoice.get('currency')) + '</td>';
					var taxEl = $('<tr>', {data: {'var': 'tax', 'tax-name': key}, 'class': 'tax-' + val.index + ' totals-row'});
					
					$totalEl.before(taxEl);
					taxEl.html(taxHtml);
				}
            }, this);
        }
    },
    updateColspan: function() {
        if (!taxes.length) {
            this.colspan = 2;
        } else if (taxes.length === 1) {
            this.colspan = 3;
        } else {
            this.colspan = 4;
        }

        this.$el.find('.wide-cell').attr('colspan', this.colspan);
    }
});

function extraFieldsRender()
{

    if ($('#label_field10').val() == '' && $('#field10_value').val() == '')
    {
        $('.field10_row').hide();
    }

    if ($('#label_field9').val() == '' && $('#field9_value').val() == '')
    {
        $('.field9_row').hide();
    } else {
        $('.field10_row').show();
    }

    if ($('#label_field8').val() == '' && $('#field8_value').val() == '')
    {
        $('.field8_row').hide();
    } else {
        $('.field9_row').show();
    }

    if ($('#label_field7').val() == '' && $('#field7_value').val() == '')
    {
        $('.field7_row').hide();
    } else {
        $('.field8_row').show();
    }

    if ($('#label_field6').val() == '' && $('#field6_value').val() == '')
    {
        $('.field6_row').hide();
    } else {
        $('.field7_row').show();
    }

    if ($('#label_field5').val() == '' && $('#field5_value').val() == '')
    {
        $('.field5_row').hide();
    } else {
        $('.field6_row').show();
    }

    if ($('#label_field4').val() == '' && $('#field4_value').val() == '')
    {
        $('.field4_row').hide();
    } else {
        $('.field5_row').show();
    }

    if ($('#label_field3').val() == '' && $('#field3_value').val() == '')
    {
        $('.field3_row').hide();
    } else {

        $('.field4_row').show();
    }

    if ($('#label_field2').val() == '' && $('#field2_value').val() == '')
    {
        $('.field2_row').hide();
    }
    else {
        $('.field3_row').show();
    }

    if ($('#label_field1').val() == '' && $('#field1_value').val() == '')
    {
        // Todo
    }
    else {
        $('.field2_row').show();
    }


    $('#label_field1').attr('placeholder', '[ADD MORE]')
}


function activateBalanceDue()
{
	$('#PaidRow').removeClass('shaped');
	$('#UnpaidRow').removeClass('shaped');
	$('#toggle_paid').removeClass('show-row').addClass('hide-row');
	invoice.set('show_balance_due',1);
}

function deactivateBalanceDue()
{
	$('#PaidRow').addClass('shaped');
	$('#UnpaidRow').addClass('shaped');
	$('#toggle_paid').removeClass('hide-row').addClass('show-row');
	invoice.set('show_balance_due',0);
}

function justifyStyle() {
    $('td[align="right"] input').css({'text-align': 'right'});
    $('strong input').css({'font-weight': 'bold'})
	
	$('#toggle_paid').click(function(){
		if($('#toggle_paid').hasClass('hide-row'))
		{
			deactivateBalanceDue();
		}
		else
		{
			activateBalanceDue();
		}
		return false;
	});
}
/**
 * Set Logo Editor
 */
function setLogoEditor() {
    var $logoDiv = $('<div>', {id: 'logoDiv'});
    var $logo = $('#logo').css({width: invoice.get('logo_width'), height: invoice.get('logo_height')}).removeClass('editable-area').wrap($logoDiv);

    var popoverHTML = _.template(document.getElementById('logoPopover').innerHTML);
    function logoPopover() {
        var $logoPopover = $('<div>', {id: 'logoPopverDiv'});
        var dims = {width: $logo.width(), height: $logo.height()};

        $logoPopover.html(popoverHTML({width: dims.width, height: dims.height}));
        $logoPopover.find('#logoUpload').fineUploader({
            request: {
                endpoint: SITE_ROOT + 'invoices/upload_logo',
                inputName: 'logo'
            },
            multiple: false,
            failedUploadTextDisplay: {
                mode: 'custom',
                responseProperty: 'error'
            }
        }).on('complete', function(e, id, filename, response) {
            if (!response.error) {
                $('#logo').attr('src', SITE_ROOT + response.full_path);
                invoice.set('logo', SITE_ROOT + response.full_path);
                dims = response.dims;
                $('.qq-upload-list').hide();
            }
        });

        $logoPopover.find('.dim-slider-var').slider({
            rane: 'min',
            min: 50,
            max: 300,
            value: 150,
            change: function() {
                var value = $(this).slider('value');
                var dataVar = $(this).data('var');

                invoice.set('logo_' + dataVar, value);
                $logo.css(dataVar, value);
            }
        }).each(function() {
            var dataVar = $(this).data('var');
            $(this).slider('value', dims[dataVar]);
        }).end().find('.dim-slider-ratio').slider({
            range: 'min',
            min: 0.5,
            max: 2.5,
            value: dims.width / dims.height,
            step: 0.1,
            change: function() {
                var value = $(this).slider('value');
                $logoPopover.find('#widthSlider').slider('value', value * dims.width).end().find('#heightSlider').slider('value', value * dims.height);
            }
        }).end().find('#keepAspect').on('click change', function() {
            if (this.checked) {
                $logoPopover.find('.dim-slider-var').slider('disable');
                $logoPopover.find('.dim-slider-ratio').slider('enable');
            } else {
                $logoPopover.find('.dim-slider-var').slider('enable');
                $logoPopover.find('.dim-slider-ratio').slider('disable');
            }
        }).change();
        return $logoPopover;
    }

    $logo.popover({title: 'Logo Size <a class="close" onclick="$(\'#logo\').popover(\'hide\'); return false;">&times;</a>', content: logoPopover, html: true, placement: 'bottom'});
}


//Actions
$(function() {



    $('h1').contents().focus();
    if (!window.localStorage.qi_key) {
        window.localStorage.qi_key = guid();
    }
	
	
	

    invoiceItems.add(new Item({description: 'Product name', qty: 1, unit_price: 0}));
    invoice.set({template_id: initialTemplate});
    taxes.preload();
    $('#addTax').click(function() {
        taxes.add(new Tax({}));
        return false;
    });

    $('#templateArea').delegate('.invoice-input', 'change', function(evt) {
		
		
		
		if(this.id=='paid') $(this).val($(this).val().replace(/[^\d.-]/g,''));

        invoice.set(this.id, $(this).val());
    }).delegate('#AddProduct', 'click', function() {
        invoiceItems.add(new Item({description: 'Product name', qty: 1, unit_price: 0}));
            invoiceItems.each(function(iitem) {
                        iitem.calculateSubtotal();
                    });
    });

    $('#InvoiceTemplateLoaders').delegate('.load-template', 'click', function(evt) {
        evt.preventDefault();

        var template_id = parseInt($(this).data('template-id'));
        if (template_id !== invoice.get('template_id')) {
            $('#template_name').text($(this).data('template-name'));
            document.title = "Create Invoice - " + $(this).data('template-name') + " Template ";
            $('.template-loading').button('loading');
            invoice.set({template_id: template_id});
        }
    });
    var currencyList = $('.currency-list li');
    $('#currencyFilter').on('keyup', function() {
        var value = $.trim($(this).val().toLowerCase());
        if (value) {
            currencyList.hide().filter(function() {
                var link = $('a', this);
                return $.trim(link.text().toLowerCase()).indexOf(value) === 0 || $.trim(link.data('currency').toLowerCase()).indexOf(value) === 0;
                //return $.trim(link.text().toLowerCase()).startsWith(value) || $.trim(link.data('currency').toLowerCase()).startsWith(value);
            }).show();
        } else {
            currencyList.show();
        }
    });
    $('[data-currency]').click(function(evt) {
        evt.preventDefault();
        invoice.set('currency', $(this).data('currency'));
    });

    /*$('#logo').live('click', function() {
     $('#logoModal').modal().modal('show');
     });*/
	 
	 

    $('#discountInput').change(function() {
        var val = parseFloat(this.value);
        if (val < 0) {
            val = 0;
        } else if (val > 99) {
            val = 99;
        }
        invoice.set({flat_discount: 0});
        invoice.set({discount: val});
    });

    $('#flatDiscountInput').change(function() {
        var val = parseFloat(this.value);
        invoice.set({discount: 0});
        invoice.set({flat_discount: val});

    });

    $('#discountType').change(function() {
        if ($(this).val() == 'flat')
        {
            $('#percent_discount').hide();
            $('#flat_discount_input').show();
            $('#discountInput').val('');
        }
        else
        {
            $('#flat_discount_input').hide();
            $('#percent_discount').show();
            $('#flatDiscountInput').val('');
        }
    });

    var $previewForm = $('<form>', {action: SITE_ROOT + 'invoices/preview', target: '_blank', method: 'post', 'class': 'hide', name: 'preview'});
    var $previewPdfForm = $('<form>', {action: SITE_ROOT + 'invoices/preview/0/1', target: '_blank', method: 'post', 'class': 'hide', name: 'preview_pdf'});
    $('body').append($previewForm).append($previewPdfForm);

    $('#btnPreview').on('click', function() {
//        submitForm($previewForm);
    });
  
    $('.btnPreview').on('click', function() {
        submitForm($previewForm);
    });
    
    $('#btnPreviewPdf').on('click', function() {
  //      submitForm($previewPdfForm);
    });
    
    $('.btnPreviewPdf').on('click', function() {
        submitForm($previewPdfForm);
    });    

    $('#btnSaveInvoice').on('click', function() {
        $('#sendForm input').each(function() {
            invoice.set($(this).attr('name'), $(this).val());
        })
        invoice.validate();
        if (!invoice.isValid()) {
            return false;
        }

        var $this = $(this);
        $this.button('loading');
        invoice.save({prefilled_template_id:prefilled_template_id,invoice_items: invoiceItems.toJSON(), invoice_taxes: taxes.toJSON()}, {validate: false}).done(function(result) {
            if (result.error) {
                errorMessage(result.message);
            } else {
                window.location = SITE_ROOT + 'invoices/thankyou/' + result.data.Invoice.id;
            }
            $this.button('reset');
        }).error(function() {
            errorMessage('An error has occurred while sending invoice');
            $this.button('reset');
        });
    });

    $('.btnSaveInvoice').on('click', function() {
        $('#sendForm input').each(function() {
            invoice.set($(this).attr('name'), $(this).val());
        })
        invoice.validate();
        if (!invoice.isValid()) {
            return false;
        }
		

        var $this = $(this);
        $this.button('loading');
        invoice.save({prefilled_template_id:prefilled_template_id,invoice_items: invoiceItems.toJSON(), invoice_taxes: taxes.toJSON()}, {validate: false}).done(function(result) {
            if (result.error) {
                errorMessage(result.message);
            } else {
                window.location = SITE_ROOT + 'invoices/thankyou/' + result.data.Invoice.id;
            }
            $this.button('reset');
        }).error(function() {
            errorMessage('An error has occurred while sending invoice');
            $this.button('reset');
        });
		invoiceToLocalStorage();
    });


    function submitForm($form) {
		
		invoiceToLocalStorage();
		
        $form.html('');
        $form.append($('<input type="text" name="is_pre_filled" />').val(is_pre_filled));
        $form.append($('<input type="text" name="prefilled_template_id" />').val(prefilled_template_id));
        $form.append($('<input type="text" name="invoice" />').val(JSON.stringify(invoice.toJSON())));
		if (typeof advancedEdit == 'function') { 
			$form.append($('<input type="text" name="is_html"  />').val('1'));
		}
        $form.append($('<input type="text" name="invoice_items" />').val(JSON.stringify(invoiceItems.toJSON())));
        if ($form.attr('name') === 'preview') {

            //window.open('about:blank',  'width=720,height=' + (window.screen.height - 50) + ',resizable=yes,scrollbars=yes,top=100,left=100');
            $form.attr('target', '_blank');
        }
        $form.submit();
    }

    $('#sendForm').delegate(':input', 'change', function() {
		
        invoice.set(this.name, this.value);
    });

    $('#paymentMethodMenu').on('change', function(evt) {
        var val = $(this).val();

//		invoice.set('payment_method', val);
        if (val) {
            $('#userLabel').text(paymentMethods[val].field1_label);
            if (paymentMethods[val].field2_label) {
                $('#paymentExtraOption').show().find('#paymentExtraOptionLabel').text(paymentMethods[val].field2_label);
            } else {
                $('#paymentExtraOption').hide().find('#paymentExtraOptionLabel').val('');
            }
        } else {
            $('#userLabel').text($('#userLabel').data('default-text'));
            $('#paymentExtraOption').hide();
        }
    });

    $('#enablePayment').on('click change', function() {
        if (this.checked) {
            $('#paymentOptions').show();
        } else {
            $('#paymentOptions').hide();
        }
    }).change();
    $("#enableBCC").on("click", function() {
        if ($(this).attr('value') == 0) {
            $(this).attr('value', 1);
        } else {
            $(this).attr('value', 0);
        }
    });
	
	
});

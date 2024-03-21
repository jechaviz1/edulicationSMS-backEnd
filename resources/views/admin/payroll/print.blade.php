<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <title>{{ $title }}</title>
    
    <style type="text/css" media="print">
    @media print {
      @page { size: A4 portrait; margin: 10px auto; }   
      @page :footer { display: none }
      @page :header { display: none }
      body { margin: 15mm 15mm 15mm 15mm; }
      table, tbody {page-break-before: auto;}
    }
    table, img, svg {
      break-inside: avoid;
    }
    .template-container {
      -webkit-transform: scale(1.0);  /* Saf3.1+, Chrome */
      -moz-transform: scale(1.0);  /* FF3.5+ */
      -ms-transform: scale(1.0);  /* IE9 */
      -o-transform: scale(1.0);  /* Opera 10.5+ */
      transform: scale(1.0);
    }
    </style>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/print/css/receipt.css') }}" media="screen, print">


</head>
<body>

<div class="template-container printable" style="width: {{ $print->width }}; height: {{ $print->height }};">
  <div class="template-inner">
    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-title">
                  <div class="inner">
                    <h2>{{ $print->title }}</h2>
                  </div>
                </td>
                <td class="temp-logo last">
                  <div class="inner">
                    @if($print->logo_right)
                    <img src="{{ asset('/pay_slip_setting/'.$print->logo_right) }}" alt="Logo">
                    @endif
                  </div>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border top-meta-table">
        <tbody>
            <tr>
                <td class="meta-data">Staff ID</td>
                <td class="meta-data value width2">: {{ $row->employ->id ?? '' }}</td>
                <td class="meta-data">Receipt</td>
                <td class="meta-data value">: {{ str_pad($row->id, 6, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td class="meta-data">Name</td>
                <td class="meta-data value width2">: {{ $row->employ->first_name ?? '' }} {{ $row->employ->last_name ?? '' }}</td>
                <td class="meta-data">Salary Type</td>
                <td class="meta-data value">: 
                    @if( $row->salary_type == 1 )
                    Fixed
                    @elseif( $row->salary_type == 2 )
                    Hourly
                    @endif
                </td>
            </tr>
            <tr>
                <td class="meta-data">Department</td>
                <td class="meta-data value width2">: {{ $row->employ->department->department_name ?? '' }}</td>
                <td class="meta-data">Pay Date</td>
                <td class="meta-data value">: 
                    @if($row->status == 1)
                    {{ date("Y-m-d", strtotime($row->pay_date)) }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="meta-data">Designation</td>
                <td class="meta-data value width2">: {{ $row->employ->designation->designation_name ?? '' }}</td>
                <td class="meta-data">Payment Method</td>
                <td class="meta-data value">: 
                    @if( $row->payment_method == 1 )
                    Card
                    @elseif( $row->payment_method == 2 )
                    Cash
                    @elseif( $row->payment_method == 3 )
                    Cheque
                    @elseif( $row->payment_method == 4 )
                    Bank
                    @elseif( $row->payment_method == 5 )
                    E-Wallet
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border receipt">
        <thead>
            <tr>
                <th class="width2">Type</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="2" class="exam-title">
                    {{ date("F Y", strtotime($row->salary_month)) }}
                </td>
            </tr>
            <tr class="border-bottom">
                <td>Earning</td>
                <td>{{ number_format((float)$row->total_earning, 2) }} $</td>
            </tr>
            @foreach($row->details->where('status', 1) as $detail)
            <tr class="border-bottom">
                <td>{{ $detail->title }}</td>
                <td>+ {{ number_format((float)$detail->amount, 2) }} $</td>
            </tr>
            @endforeach
            @foreach($row->details->where('status', 0) as $detail)
            <tr class="border-bottom">
                <td>{{ $detail->title }}</td>
                <td>- {{ number_format((float)$detail->amount, 2) }} $</td>
            </tr>
            @endforeach
            <tr class="border-bottom">
                <td>Gross Salary</td>
                <td>~ {{ number_format((float)$row->gross_salary, 2) }} $</td>
            </tr>
            <tr class="border-bottom">
                <td>Tax</td>
                <td>- {{ number_format((float)$row->tax, 2) }} $</td>
            </tr>
            <tr class="tfoot">
                <th>Net Salary:</th>
                <th>= {{ number_format((float)$row->net_salary, 2) }} $</th>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->

    <!-- Header Section -->
    <table class="table-no-border">
        <tbody>
            <tr>
                <td class="temp-footer">
                  @isset($print->footer_left)
                  <div class="inner">
                    <p>{!! $print->footer_left !!}</p>
                  </div>
                  @endisset
                </td>
                <td class="temp-footer last">
                  @isset($print->footer_right)
                  <div class="inner">
                    <p>{!! $print->footer_right !!}</p>
                  </div>
                  @endisset
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Header Section -->
  </div>
</div>

    <!-- Print Js -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/print/js/jQuery.print.min.js') }}"></script>

    <script type="text/javascript">
    $( document ).ready(function() {
      "use strict";
      $.print(".printable");
    });
    </script>

</body>
</html>
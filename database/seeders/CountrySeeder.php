<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert(array(
            array('id' => 1, 'name' => 'Adelie Land (France)', 'code' => 'ALF', 'description' => 'Adelie Land, a part of France'),
            array('id' => 2, 'name' => 'Afghanistan', 'code' => 'AF', 'description' => 'A country located in South Asia'),
            array('id' => 3, 'name' => 'Albania', 'code' => 'AL', 'description' => 'A country located in Southeastern Europe'),
            array('id' => 4, 'name' => 'Algeria', 'code' => 'DZ', 'description' => 'A country in North Africa'),
            array('id' => 5, 'name' => 'Andorra', 'code' => 'AD', 'description' => 'A small country between France and Spain'),
            array('id' => 6, 'name' => 'Angola', 'code' => 'AO', 'description' => 'A country on the west coast of Southern Africa'),
            array('id' => 7, 'name' => 'Anguilla', 'code' => 'AI', 'description' => 'A British Overseas Territory in the Caribbean'),
            array('id' => 8, 'name' => 'Antarctica', 'code' => 'AQ', 'description' => 'The southernmost continent, containing the South Pole'),
            array('id' => 9, 'name' => 'Antigua and Barbuda', 'code' => 'AG', 'description' => 'A country located in the West Indies in the Americas'),
            array('id' => 10, 'name' => 'Argentina', 'code' => 'AR', 'description' => 'A country in South America'),
            array('id' => 11, 'name' => 'Armenia', 'code' => 'AM', 'description' => 'A country in the South Caucasus region of Eurasia'),
            array('id' => 12, 'name' => 'Aruba', 'code' => 'AW', 'description' => 'An island country in the mid-south of the Caribbean Sea'),
            array('id' => 13, 'name' => 'Australia', 'code' => 'AU', 'description' => 'A country and continent surrounded by the Indian and Pacific oceans'),
            array('id' => 14, 'name' => 'Austria', 'code' => 'AT', 'description' => 'A landlocked East Alpine country in the southern part of Central Europe'),
            array('id' => 15, 'name' => 'Azerbaijan', 'code' => 'AZ', 'description' => 'A country located at the boundary of Eastern Europe and Western Asia'),
            array('id' => 16, 'name' => 'Bahamas', 'code' => 'BS', 'description' => 'A country within the Lucayan Archipelago of the West Indies in the Atlantic'),
            array('id' => 17, 'name' => 'Bahrain', 'code' => 'BH', 'description' => 'A country in the Persian Gulf'),
            array('id' => 18, 'name' => 'Bangladesh', 'code' => 'BD', 'description' => 'A country in South Asia'),
            array('id' => 19, 'name' => 'Barbados', 'code' => 'BB', 'description' => 'An island country in the Lesser Antilles of the West Indies'),
            array('id' => 20, 'name' => 'Belarus', 'code' => 'BY', 'description' => 'A country in Eastern Europe'),
            array('id' => 21, 'name' => 'Belgium', 'code' => 'BE', 'description' => 'A country in Western Europe'),
            array('id' => 22, 'name' => 'Belize', 'code' => 'BZ', 'description' => 'A country on the eastern coast of Central America'),
            array('id' => 23, 'name' => 'Benin', 'code' => 'BJ', 'description' => 'A country in West Africa'),
            array('id' => 24, 'name' => 'Bermuda', 'code' => 'BM', 'description' => 'A British Overseas Territory in the North Atlantic Ocean'),
            array('id' => 25, 'name' => 'Bhutan', 'code' => 'BT', 'description' => 'A landlocked country in the Eastern Himalayas'),
            array('id' => 26, 'name' => 'Bolivia', 'code' => 'BO', 'description' => 'A landlocked country in western-central South America'),
            array('id' => 27, 'name' => 'Bosnia and Herzegovina', 'code' => 'BA', 'description' => 'A country on the Balkan Peninsula in southeastern Europe'),
            array('id' => 28, 'name' => 'Botswana', 'code' => 'BW', 'description' => 'A landlocked country in Southern Africa'),
            array('id' => 29, 'name' => 'Brazil', 'code' => 'BR', 'description' => 'The largest country in South America and Latin America'),
            array('id' => 30, 'name' => 'Brunei', 'code' => 'BN', 'description' => 'A country located on the north coast of the island of Borneo in Southeast Asia'),
            array('id' => 31, 'name' => 'Bulgaria', 'code' => 'BG', 'description' => 'A country in Southeast Europe'),
            array('id' => 32, 'name' => 'Burkina Faso', 'code' => 'BF', 'description' => 'A landlocked country in West Africa'),
            array('id' => 33, 'name' => 'Burundi', 'code' => 'BI', 'description' => 'A landlocked country in the Great Rift Valley where the African Great Lakes region and East Africa converge'),
            array('id' => 34, 'name' => 'Cambodia', 'code' => 'KH', 'description' => 'A country located in the southern portion of the Indochinese Peninsula in Southeast Asia'),
            array('id' => 35, 'name' => 'Cameroon', 'code' => 'CM', 'description' => 'A country in Central Africa'),
            array('id' => 36, 'name' => 'Canada', 'code' => 'CA', 'description' => 'A country in North America'),
            array('id' => 37, 'name' => 'Cape Verde', 'code' => 'CV', 'description' => 'An island country in the central Atlantic Ocean'),
            array('id' => 38, 'name' => 'Cayman Islands', 'code' => 'KY', 'description' => 'A British Overseas Territory in the western Caribbean Sea'),
            array('id' => 39, 'name' => 'Central African Republic', 'code' => 'CF', 'description' => 'A landlocked country in Central Africa'),
            array('id' => 40, 'name' => 'Chad', 'code' => 'TD', 'description' => 'A landlocked country in north-central Africa'),
            array('id' => 41, 'name' => 'Chile', 'code' => 'CL', 'description' => 'A country in western South America'),
            array('id' => 42, 'name' => 'China', 'code' => 'CN', 'description' => 'A country in East Asia'),
            array('id' => 43, 'name' => 'Christmas Island', 'code' => 'CX', 'description' => 'An Australian external territory in the Indian Ocean'),
            array('id' => 44, 'name' => 'Cocos (Keeling) Islands', 'code' => 'CC', 'description' => 'An Australian external territory in the Indian Ocean'),
            array('id' => 45, 'name' => 'Colombia', 'code' => 'CO', 'description' => 'A country in South America'),
            array('id' => 46, 'name' => 'Comoros', 'code' => 'KM', 'description' => 'A country in the Indian Ocean, located at the northern end of the Mozambique Channel off the eastern coast of Africa'),
            array('id' => 47, 'name' => 'Congo (Brazzaville)', 'code' => 'CG', 'description' => 'A country in Central Africa, officially known as the Republic of the Congo'),
            array('id' => 48, 'name' => 'Congo (Kinshasa)', 'code' => 'CD', 'description' => 'A country in Central Africa, officially known as the Democratic Republic of the Congo'),
            array('id' => 49, 'name' => 'Cook Islands', 'code' => 'CK', 'description' => 'A self-governing island country in free association with New Zealand, located in the South Pacific Ocean'),
            array('id' => 50, 'name' => 'Costa Rica', 'code' => 'CR', 'description' => 'A country in Central America'),
            array('id' => 51, 'name' => 'Croatia', 'code' => 'HR', 'description' => 'A country at the crossroads of Central and Southeast Europe'),
            array('id' => 52, 'name' => 'Cuba', 'code' => 'CU', 'description' => 'A country comprising the island of Cuba, as well as Isla de la Juventud and several minor archipelagos'),
            array('id' => 53, 'name' => 'Cyprus', 'code' => 'CY', 'description' => 'An island country in the Eastern Mediterranean'),
            array('id' => 54, 'name' => 'Czech Republic', 'code' => 'CZ', 'description' => 'A landlocked country in Central Europe'),
            array('id' => 55, 'name' => 'Denmark', 'code' => 'DK', 'description' => 'A Nordic country in Northern Europe'),
            array('id' => 56, 'name' => 'Djibouti', 'code' => 'DJ', 'description' => 'A country located in the Horn of Africa'),
            array('id' => 57, 'name' => 'Dominica', 'code' => 'DM', 'description' => 'An island country in the Caribbean'),
            array('id' => 58, 'name' => 'Dominican Republic', 'code' => 'DO', 'description' => 'A country located on the island of Hispaniola in the Greater Antilles archipelago of the Caribbean region'),
            array('id' => 59, 'name' => 'East Timor', 'code' => 'TL', 'description' => 'A country in Southeast Asia'),
            array('id' => 60, 'name' => 'Ecuador', 'code' => 'EC', 'description' => 'A country in northwestern South America'),
            array('id' => 61, 'name' => 'Egypt', 'code' => 'EG', 'description' => 'A transcontinental country spanning the northeast corner of Africa and southwest corner of Asia'),
            array('id' => 62, 'name' => 'El Salvador', 'code' => 'SV', 'description' => 'The smallest and the most densely populated country in Central America'),
            array('id' => 63, 'name' => 'Equatorial Guinea', 'code' => 'GQ', 'description' => 'A country located on the west coast of Central Africa'),
            array('id' => 64, 'name' => 'Eritrea', 'code' => 'ER', 'description' => 'A country in the Horn of Africa'),
            array('id' => 65, 'name' => 'Estonia', 'code' => 'EE', 'description' => 'A country in Northern Europe'),
            array('id' => 66, 'name' => 'Eswatini', 'code' => 'SZ', 'description' => 'A landlocked country in Southern Africa, formerly known as Swaziland'),
            array('id' => 67, 'name' => 'Ethiopia', 'code' => 'ET', 'description' => 'A country in the Horn of Africa'),
            array('id' => 68, 'name' => 'Falkland Islands', 'code' => 'FK', 'description' => 'An archipelago in the South Atlantic Ocean, a British Overseas Territory'),
            array('id' => 69, 'name' => 'Faroe Islands', 'code' => 'FO', 'description' => 'A North Atlantic archipelago and an autonomous territory of the Kingdom of Denmark'),
            array('id' => 70, 'name' => 'Fiji', 'code' => 'FJ', 'description' => 'An island country in Melanesia, part of Oceania in the South Pacific Ocean'),
            array('id' => 71, 'name' => 'Finland', 'code' => 'FI', 'description' => 'A Nordic country in Northern Europe'),
            array('id' => 72, 'name' => 'France', 'code' => 'FR', 'description' => 'A country in Western Europe'),
            array('id' => 73, 'name' => 'French Guiana', 'code' => 'GF', 'description' => 'An overseas department of France on the northeast coast of South America'),
            array('id' => 74, 'name' => 'French Polynesia', 'code' => 'PF', 'description' => 'An overseas collectivity of France in the South Pacific Ocean'),
            array('id' => 75, 'name' => 'Gabon', 'code' => 'GA', 'description' => 'A country on the west coast of Central Africa'),
            array('id' => 76, 'name' => 'Gambia', 'code' => 'GM', 'description' => 'A country in West Africa'),
            array('id' => 77, 'name' => 'Georgia', 'code' => 'GE', 'description' => 'A country located at the intersection of Eastern Europe and Western Asia'),
            array('id' => 78, 'name' => 'Germany', 'code' => 'DE', 'description' => 'A country in Central Europe'),
            array('id' => 79, 'name' => 'Ghana', 'code' => 'GH', 'description' => 'A country in West Africa'),
            array('id' => 80, 'name' => 'Gibraltar', 'code' => 'GI', 'description' => 'A British Overseas Territory located at the southern tip of the Iberian Peninsula'),
            array('id' => 81, 'name' => 'Greece', 'code' => 'GR', 'description' => 'A country in Southeast Europe'),
            array('id' => 82, 'name' => 'Greenland', 'code' => 'GL', 'description' => 'An autonomous territory within the Kingdom of Denmark'),
            array('id' => 83, 'name' => 'Grenada', 'code' => 'GD', 'description' => 'A country in the West Indies in the Caribbean Sea'),
            array('id' => 84, 'name' => 'Guadeloupe', 'code' => 'GP', 'description' => 'An overseas region of France in the Caribbean'),
            array('id' => 85, 'name' => 'Guam', 'code' => 'GU', 'description' => 'An unincorporated and organized territory of the United States in Micronesia in the western Pacific Ocean'),
            array('id' => 86, 'name' => 'Guatemala', 'code' => 'GT', 'description' => 'A country in Central America'),
            array('id' => 87, 'name' => 'Guernsey', 'code' => 'GG', 'description' => 'A British Crown Dependency in the English Channel'),
            array('id' => 88, 'name' => 'Guinea', 'code' => 'GN', 'description' => 'A country in West Africa'),
            array('id' => 89, 'name' => 'Guinea-Bissau', 'code' => 'GW', 'description' => 'A country in West Africa'),
            array('id' => 90, 'name' => 'Guyana', 'code' => 'GY', 'description' => 'A country on the northern mainland of South America'),
            array('id' => 91, 'name' => 'Haiti', 'code' => 'HT', 'description' => 'A country located on the island of Hispaniola in the Caribbean'),
            array('id' => 92, 'name' => 'Honduras', 'code' => 'HN', 'description' => 'A country in Central America'),
            array('id' => 93, 'name' => 'Hong Kong', 'code' => 'HK', 'description' => 'A Special Administrative Region of China'),
            array('id' => 94, 'name' => 'Hungary', 'code' => 'HU', 'description' => 'A country in Central Europe'),
            array('id' => 95, 'name' => 'Iceland', 'code' => 'IS', 'description' => 'A Nordic island country in the North Atlantic Ocean'),
            array('id' => 96, 'name' => 'India', 'code' => 'IN', 'description' => 'A country in South Asia'),
            array('id' => 97, 'name' => 'Indonesia', 'code' => 'ID', 'description' => 'A country in Southeast Asia and Oceania'),
            array('id' => 98, 'name' => 'Iran', 'code' => 'IR', 'description' => 'A country in Western Asia'),
            array('id' => 99, 'name' => 'Iraq', 'code' => 'IQ', 'description' => 'A country in Western Asia'),
            array('id' => 100, 'name' => 'Ireland', 'code' => 'IE', 'description' => 'A country in Western Europe'),
            array('id' => 101, 'name' => 'Isle of Man', 'code' => 'IM', 'description' => 'A self-governing British Crown dependency in the Irish Sea'),
            array('id' => 102, 'name' => 'Israel', 'code' => 'IL', 'description' => 'A country in Western Asia'),
            array('id' => 103, 'name' => 'Italy', 'code' => 'IT', 'description' => 'A country in Southern Europe'),
            array('id' => 104, 'name' => 'Jamaica', 'code' => 'JM', 'description' => 'An island country in the Caribbean'),
            array('id' => 105, 'name' => 'Japan', 'code' => 'JP', 'description' => 'An island country in East Asia'),
            array('id' => 106, 'name' => 'Jersey', 'code' => 'JE', 'description' => 'A British Crown Dependency in the English Channel'),
            array('id' => 107, 'name' => 'Jordan', 'code' => 'JO', 'description' => 'A country in Western Asia'),
            array('id' => 108, 'name' => 'Kazakhstan', 'code' => 'KZ', 'description' => 'A country in Central Asia'),
            array('id' => 109, 'name' => 'Kenya', 'code' => 'KE', 'description' => 'A country in East Africa'),
            array('id' => 110, 'name' => 'Kiribati', 'code' => 'KI', 'description' => 'A country in the central Pacific Ocean'),
            array('id' => 111, 'name' => 'Korea (North)', 'code' => 'KP', 'description' => 'A country in East Asia, officially known as the Democratic People\'s Republic of Korea'),
            array('id' => 112, 'name' => 'Korea (South)', 'code' => 'KR', 'description' => 'A country in East Asia, officially known as the Republic of Korea'),
            array('id' => 113, 'name' => 'Kuwait', 'code' => 'KW', 'description' => 'A country in Western Asia'),
            array('id' => 114, 'name' => 'Kyrgyzstan', 'code' => 'KG', 'description' => 'A country in Central Asia'),
            array('id' => 115, 'name' => 'Lao', 'code' => 'LA', 'description' => 'A landlocked country in Southeast Asia'),
            array('id' => 116, 'name' => 'Latvia', 'code' => 'LV', 'description' => 'A country in the Baltic region of Northern Europe'),
            array('id' => 117, 'name' => 'Lebanon', 'code' => 'LB', 'description' => 'A country in Western Asia'),
            array('id' => 118, 'name' => 'Lesotho', 'code' => 'LS', 'description' => 'A landlocked country in Southern Africa'),
            array('id' => 119, 'name' => 'Liberia', 'code' => 'LR', 'description' => 'A country on the west coast of Africa'),
            array('id' => 120, 'name' => 'Libya', 'code' => 'LY', 'description' => 'A country in North Africa'),
            array('id' => 121, 'name' => 'Liechtenstein', 'code' => 'LI', 'description' => 'A small landlocked country in Central Europe'),
            array('id' => 122, 'name' => 'Lithuania', 'code' => 'LT', 'description' => 'A country in the Baltic region of Europe'),
            array('id' => 123, 'name' => 'Luxembourg', 'code' => 'LU', 'description' => 'A small landlocked country in Western Europe'),
            array('id' => 124, 'name' => 'Macao', 'code' => 'MO', 'description' => 'A Special Administrative Region of China'),
            array('id' => 125, 'name' => 'Madagascar', 'code' => 'MG', 'description' => 'An island country in the Indian Ocean'),
            array('id' => 126, 'name' => 'Malawi', 'code' => 'MW', 'description' => 'A landlocked country in southeastern Africa'),
            array('id' => 127, 'name' => 'Malaysia', 'code' => 'MY', 'description' => 'A country in Southeast Asia'),
            array('id' => 128, 'name' => 'Maldives', 'code' => 'MV', 'description' => 'An island country in the Indian Ocean'),
            array('id' => 129, 'name' => 'Mali', 'code' => 'ML', 'description' => 'A landlocked country in West Africa'),
            array('id' => 130, 'name' => 'Malta', 'code' => 'MT', 'description' => 'An island country in the Mediterranean Sea'),
            array('id' => 131, 'name' => 'Marshall Islands', 'code' => 'MH', 'description' => 'A country of atolls and islands in the central Pacific Ocean'),
            array('id' => 132, 'name' => 'Mauritania', 'code' => 'MR', 'description' => 'A country in West Africa'),
            array('id' => 133, 'name' => 'Mauritius', 'code' => 'MU', 'description' => 'An island nation in the Indian Ocean'),
            array('id' => 134, 'name' => 'Mayotte', 'code' => 'YT', 'description' => 'An overseas department and region of France'),
            array('id' => 135, 'name' => 'Mexico', 'code' => 'MX', 'description' => 'A country in the southern portion of North America'),
            array('id' => 136, 'name' => 'Micronesia', 'code' => 'FM', 'description' => 'A country in Oceania consisting of four states in the western Pacific Ocean'),
            array('id' => 137, 'name' => 'Moldova', 'code' => 'MD', 'description' => 'A landlocked country in Eastern Europe'),
            array('id' => 138, 'name' => 'Monaco', 'code' => 'MC', 'description' => 'A sovereign city-state on the French Riviera in Western Europe'),
            array('id' => 139, 'name' => 'Mongolia', 'code' => 'MN', 'description' => 'A landlocked country in East Asia and Central Asia'),
            array('id' => 140, 'name' => 'Montenegro', 'code' => 'ME', 'description' => 'A country in Southeast Europe on the Adriatic Sea'),
            array('id' => 141, 'name' => 'Montserrat', 'code' => 'MS', 'description' => 'A British Overseas Territory in the Caribbean'),
            array('id' => 142, 'name' => 'Morocco', 'code' => 'MA', 'description' => 'A country in North Africa'),
            array('id' => 143, 'name' => 'Mozambique', 'code' => 'MZ', 'description' => 'A country in Southeast Africa'),
            array('id' => 144, 'name' => 'Myanmar', 'code' => 'MM', 'description' => 'A country in Southeast Asia'),
            array('id' => 145, 'name' => 'Namibia', 'code' => 'NA', 'description' => 'A country in southern Africa'),
            array('id' => 146, 'name' => 'Nauru', 'code' => 'NR', 'description' => 'A small island country in Micronesia in the Central Pacific'),
            array('id' => 147, 'name' => 'Nepal', 'code' => 'NP', 'description' => 'A landlocked country in South Asia'),
            array('id' => 148, 'name' => 'Netherlands', 'code' => 'NL', 'description' => 'A country in Northwestern Europe'),
            array('id' => 149, 'name' => 'New Caledonia', 'code' => 'NC', 'description' => 'A special collectivity of France located in the southwest Pacific Ocean'),
            array('id' => 150, 'name' => 'New Zealand', 'code' => 'NZ', 'description' => 'An island country in the southwestern Pacific Ocean'),
            array('id' => 151, 'name' => 'Nicaragua', 'code' => 'NI', 'description' => 'A country in Central America'),
            array('id' => 152, 'name' => 'Niger', 'code' => 'NE', 'description' => 'A landlocked country in West Africa'),
            array('id' => 153, 'name' => 'Nigeria', 'code' => 'NG', 'description' => 'A country in West Africa'),
            array('id' => 154, 'name' => 'Niue', 'code' => 'NU', 'description' => 'An island country in the South Pacific Ocean in free association with New Zealand'),
            array('id' => 155, 'name' => 'Norfolk Island', 'code' => 'NF', 'description' => 'An external territory of Australia located in the Pacific Ocean'),
            array('id' => 156, 'name' => 'North Macedonia', 'code' => 'MK', 'description' => 'A country in Southeast Europe on the Balkan Peninsula'),
            array('id' => 157, 'name' => 'Northern Mariana Islands', 'code' => 'MP', 'description' => 'A group of islands in the western Pacific Ocean, a commonwealth of the United States'),
            array('id' => 158, 'name' => 'Norway', 'code' => 'NO', 'description' => 'A country in Northern Europe'),
            array('id' => 159, 'name' => 'Oman', 'code' => 'OM', 'description' => 'A country on the southeastern coast of the Arabian Peninsula in Western Asia'),
            array('id' => 160, 'name' => 'Pakistan', 'code' => 'PK', 'description' => 'A country in South Asia'),
            array('id' => 161, 'name' => 'Palau', 'code' => 'PW', 'description' => 'An island country in the western Pacific Ocean'),
            array('id' => 162, 'name' => 'Palestine', 'code' => 'PS', 'description' => 'A region in Western Asia'),
            array('id' => 163, 'name' => 'Panama', 'code' => 'PA', 'description' => 'A country in Central America'),
            array('id' => 164, 'name' => 'Papua New Guinea', 'code' => 'PG', 'description' => 'A country in Oceania, located in Melanesia'),
            array('id' => 165, 'name' => 'Paraguay', 'code' => 'PY', 'description' => 'A landlocked country in South America'),
            array('id' => 166, 'name' => 'Peru', 'code' => 'PE', 'description' => 'A country in South America'),
            array('id' => 167, 'name' => 'Philippines', 'code' => 'PH', 'description' => 'An island country in Southeast Asia'),
            array('id' => 168, 'name' => 'Pitcairn Islands', 'code' => 'PN', 'description' => 'A group of four volcanic islands in the southern Pacific Ocean, a British Overseas Territory'),
            array('id' => 169, 'name' => 'Poland', 'code' => 'PL', 'description' => 'A country in Central Europe'),
            array('id' => 170, 'name' => 'Portugal', 'code' => 'PT', 'description' => 'A country in Southwestern Europe'),
            array('id' => 171, 'name' => 'Puerto Rico', 'code' => 'PR', 'description' => 'An unincorporated territory of the United States located in the Caribbean'),
            array('id' => 172, 'name' => 'Qatar', 'code' => 'QA', 'description' => 'A country in Western Asia'),
            array('id' => 173, 'name' => 'Réunion', 'code' => 'RE', 'description' => 'An overseas department and region of France in the Indian Ocean'),
            array('id' => 174, 'name' => 'Romania', 'code' => 'RO', 'description' => 'A country in Southeastern Europe'),
            array('id' => 175, 'name' => 'Russia', 'code' => 'RU', 'description' => 'A country spanning Eastern Europe and Northern Asia'),
            array('id' => 176, 'name' => 'Rwanda', 'code' => 'RW', 'description' => 'A landlocked country in East-Central Africa'),
            array('id' => 177, 'name' => 'Saint Barthelemy', 'code' => 'BL', 'description' => 'An overseas collectivity of France located in the Caribbean'),
            array('id' => 178, 'name' => 'Saint Helena', 'code' => 'SH', 'description' => 'A British Overseas Territory located in the South Atlantic Ocean'),
            array('id' => 179, 'name' => 'Saint Kitts and Nevis', 'code' => 'KN', 'description' => 'A country in the West Indies'),
            array('id' => 180, 'name' => 'Saint Lucia', 'code' => 'LC', 'description' => 'An island country in the Eastern Caribbean'),
            array('id' => 181, 'name' => 'Saint Martin', 'code' => 'MF', 'description' => 'An overseas collectivity of France in the Caribbean'),
            array('id' => 182, 'name' => 'Saint Pierre and Miquelon', 'code' => 'PM', 'description' => 'An overseas collectivity of France near Canada'),
            array('id' => 183, 'name' => 'Saint Vincent and the Grenadines', 'code' => 'VC', 'description' => 'A country in the Caribbean'),
            array('id' => 184, 'name' => 'Samoa', 'code' => 'WS', 'description' => 'A country in Polynesia in the South Pacific Ocean'),
            array('id' => 185, 'name' => 'San Marino', 'code' => 'SM', 'description' => 'A landlocked country surrounded by Italy'),
            array('id' => 186, 'name' => 'Sao Tome and Principe', 'code' => 'ST', 'description' => 'A country in Central Africa'),
            array('id' => 187, 'name' => 'Saudi Arabia', 'code' => 'SA', 'description' => 'A country in Western Asia'),
            array('id' => 188, 'name' => 'Senegal', 'code' => 'SN', 'description' => 'A country in West Africa'),
            array('id' => 189, 'name' => 'Serbia', 'code' => 'RS', 'description' => 'A country in Southeast Europe'),
            array('id' => 190, 'name' => 'Seychelles', 'code' => 'SC', 'description' => 'An archipelago of 115 islands in the Indian Ocean'),
            array('id' => 191, 'name' => 'Sierra Leone', 'code' => 'SL', 'description' => 'A country in West Africa'),
            array('id' => 192, 'name' => 'Singapore', 'code' => 'SG', 'description' => 'A city-state and island country in Southeast Asia'),
            array('id' => 193, 'name' => 'Sint Maarten', 'code' => 'SX', 'description' => 'A country within the Kingdom of the Netherlands in the Caribbean'),
            array('id' => 194, 'name' => 'Slovakia', 'code' => 'SK', 'description' => 'A landlocked country in Central Europe'),
            array('id' => 195, 'name' => 'Slovenia', 'code' => 'SI', 'description' => 'A country in Southern Central Europe'),
            array('id' => 196, 'name' => 'Solomon Islands', 'code' => 'SB', 'description' => 'A country consisting of six major islands and over 900 smaller islands in the South Pacific Ocean'),
            array('id' => 197, 'name' => 'Somalia', 'code' => 'SO', 'description' => 'A country in the Horn of Africa'),
            array('id' => 198, 'name' => 'South Africa', 'code' => 'ZA', 'description' => 'A country located at the southern tip of Africa'),
            array('id' => 199, 'name' => 'South Georgia and the South Sandwich Islands', 'code' => 'GS', 'description' => 'A British Overseas Territory in the South Atlantic Ocean'),
            array('id' => 200, 'name' => 'South Sudan', 'code' => 'SS', 'description' => 'A country in East-Central Africa'),
            array('id' => 201, 'name' => 'Spain', 'code' => 'ES', 'description' => 'A country in Southwestern Europe'),
            array('id' => 202, 'name' => 'Sri Lanka', 'code' => 'LK', 'description' => 'An island country in South Asia'),
            array('id' => 203, 'name' => 'Sudan', 'code' => 'SD', 'description' => 'A country in North-East Africa'),
            array('id' => 204, 'name' => 'Suriname', 'code' => 'SR', 'description' => 'A country in South America'),
            array('id' => 205, 'name' => 'Svalbard', 'code' => 'SJ', 'description' => 'An archipelago in the Arctic Ocean, under Norwegian sovereignty'),
            array('id' => 206, 'name' => 'Sweden', 'code' => 'SE', 'description' => 'A country in Northern Europe'),
            array('id' => 207, 'name' => 'Switzerland', 'code' => 'CH', 'description' => 'A country in Central Europe'),
            array('id' => 208, 'name' => 'Syria', 'code' => 'SY', 'description' => 'A country in Western Asia'),
            array('id' => 209, 'name' => 'Taiwan', 'code' => 'TW', 'description' => 'A country in East Asia, officially known as the Republic of China'),
            array('id' => 210, 'name' => 'Tajikistan', 'code' => 'TJ', 'description' => 'A country in Central Asia'),
            array('id' => 211, 'name' => 'Tanzania', 'code' => 'TZ', 'description' => 'A country in East Africa'),
            array('id' => 212, 'name' => 'Thailand', 'code' => 'TH', 'description' => 'A country in Southeast Asia'),
            array('id' => 213, 'name' => 'Timor-Leste', 'code' => 'TL', 'description' => 'A country in Southeast Asia, also known as East Timor'),
            array('id' => 214, 'name' => 'Togo', 'code' => 'TG', 'description' => 'A country in West Africa'),
            array('id' => 215, 'name' => 'Tokelau', 'code' => 'TK', 'description' => 'A territory of New Zealand in the South Pacific Ocean'),
            array('id' => 216, 'name' => 'Tonga', 'code' => 'TO', 'description' => 'A Polynesian country in the South Pacific Ocean'),
            array('id' => 217, 'name' => 'Trinidad and Tobago', 'code' => 'TT', 'description' => 'A country in the Caribbean'),
            array('id' => 218, 'name' => 'Tunisia', 'code' => 'TN', 'description' => 'A country in North Africa'),
            array('id' => 219, 'name' => 'Turkey', 'code' => 'TR', 'description' => 'A country straddling Eastern Europe and Western Asia'),
            array('id' => 220, 'name' => 'Turkmenistan', 'code' => 'TM', 'description' => 'A country in Central Asia'),
            array('id' => 221, 'name' => 'Tuvalu', 'code' => 'TV', 'description' => 'A country in Polynesia in the Pacific Ocean'),
            array('id' => 222, 'name' => 'Uganda', 'code' => 'UG', 'description' => 'A country in East Africa'),
            array('id' => 223, 'name' => 'Ukraine', 'code' => 'UA', 'description' => 'A country in Eastern Europe'),
            array('id' => 224, 'name' => 'United Arab Emirates', 'code' => 'AE', 'description' => 'A country in Western Asia'),
            array('id' => 225, 'name' => 'United Kingdom', 'code' => 'GB', 'description' => 'A country in Europe consisting of England, Scotland, Wales, and Northern Ireland'),
            array('id' => 226, 'name' => 'United States', 'code' => 'US', 'description' => 'A country in North America'),
            array('id' => 227, 'name' => 'Uruguay', 'code' => 'UY', 'description' => 'A country in South America'),
            array('id' => 228, 'name' => 'Uzbekistan', 'code' => 'UZ', 'description' => 'A country in Central Asia'),
            array('id' => 229, 'name' => 'Vanuatu', 'code' => 'VU', 'description' => 'A country in the South Pacific Ocean'),
            array('id' => 230, 'name' => 'Vatican City', 'code' => 'VA', 'description' => 'The smallest independent state in the world, located in Rome'),
            array('id' => 231, 'name' => 'Venezuela', 'code' => 'VE', 'description' => 'A country on the northern coast of South America'),
            array('id' => 232, 'name' => 'Vietnam', 'code' => 'VN', 'description' => 'A country in Southeast Asia'),
            array('id' => 233, 'name' => 'Wallis and Futuna', 'code' => 'WF', 'description' => 'An overseas collectivity of France located in the South Pacific Ocean'),
            array('id' => 234, 'name' => 'Western Sahara', 'code' => 'EH', 'description' => 'A disputed territory in North Africa'),
            array('id' => 235, 'name' => 'Yemen', 'code' => 'YE', 'description' => 'A country in the Arabian Peninsula'),
            array('id' => 236, 'name' => 'Zambia', 'code' => 'ZM', 'description' => 'A landlocked country in Southern Africa'),
            array('id' => 237, 'name' => 'Zimbabwe', 'code' => 'ZW', 'description' => 'A country in Southern Africa'),
        ));
    }
    }

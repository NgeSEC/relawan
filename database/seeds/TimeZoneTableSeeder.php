<?php

use Illuminate\Database\Seeder;
use WebAppId\Content\Models\TimeZone;
use Illuminate\Support\Facades\DB;

class TimeZoneTableSeeder extends Seeder
{
/**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {
        $user_id = '1';

        $data = array(
            array(
                "code" => "CI",
                "name" => "Africa/Abidjan",
                "minute" => "-0"
            ),
            array(
                "code" => "GH",
                "name" => "Africa/Accra",
                "minute" => "-0"
            ),
            array(
                "code" => "ET",
                "name" => "Africa/Addis_Ababa",
                "minute" => "-180"
            ),
            array(
                "code" => "DZ",
                "name" => "Africa/Algiers",
                "minute" => "-60"
            ),
            array(
                "code" => "ER",
                "name" => "Africa/Asmara",
                "minute" => "-180"
            ),
            array(
                "code" => "ML",
                "name" => "Africa/Bamako",
                "minute" => "-0"
            ),
            array(
                "code" => "CF",
                "name" => "Africa/Lagos|Africa/Bangui",
                "minute" => "-60"
            ),
            array(
                "code" => "GM",
                "name" => "Africa/Banjul",
                "minute" => "-0"
            ),
            array(
                "code" => "GW",
                "name" => "Africa/Bissau",
                "minute" => "-0"
            ),
            array(
                "code" => "MW",
                "name" => "Africa/Blantyre",
                "minute" => "-120"
            ),
            array(
                "code" => "CG",
                "name" => "Africa/Brazzaville",
                "minute" => "-60"
            ),
            array(
                "code" => "BI",
                "name" => "Africa/Bujumbura",
                "minute" => "-120"
            ),
            array(
                "code" => "EG",
                "name" => "Africa/Cairo",
                "minute" => "-120"
            ),
            array(
                "code" => "MA",
                "name" => "Africa/Casablanca",
                "minute" => "-0"
            ),
            array(
                "code" => "ES",
                "name" => "Africa/Ceuta",
                "minute" => "-60"
            ),
            array(
                "code" => "GN",
                "name" => "Africa/Conakry",
                "minute" => "-0"
            ),
            array(
                "code" => "SN",
                "name" => "Africa/Dakar",
                "minute" => "-0"
            ),
            array(
                "code" => "TZ",
                "name" => "Africa/Dar_es_Salaam",
                "minute" => "-180"
            ),
            array(
                "code" => "DJ",
                "name" => "Africa/Djibouti",
                "minute" => "-180"
            ),
            array(
                "code" => "CM",
                "name" => "Africa/Douala",
                "minute" => "-60"
            ),
            array(
                "code" => "EH",
                "name" => "Africa/El_Aaiun",
                "minute" => "-0"
            ),
            array(
                "code" => "SL",
                "name" => "Africa/Freetown",
                "minute" => "-0"
            ),
            array(
                "code" => "BW",
                "name" => "Africa/Gaborone",
                "minute" => "-120"
            ),
            array(
                "code" => "ZW",
                "name" => "Africa/Harare",
                "minute" => "-120"
            ),
            array(
                "code" => "ZA",
                "name" => "Africa/Johannesburg",
                "minute" => "-120"
            ),
            array(
                "code" => "SS",
                "name" => "Africa/Juba",
                "minute" => "-180"
            ),
            array(
                "code" => "UG",
                "name" => "Africa/Kampala",
                "minute" => "-180"
            ),
            array(
                "code" => "SD",
                "name" => "Africa/Khartoum",
                "minute" => "-120"
            ),
            array(
                "code" => "RW",
                "name" => "Africa/Kigali",
                "minute" => "-120"
            ),
            array(
                "code" => "CD",
                "name" => "Africa/Kinshasa",
                "minute" => "-60"
            ),
            array(
                "code" => "NG",
                "name" => "Africa/Lagos",
                "minute" => "-60"
            ),
            array(
                "code" => "GA",
                "name" => "Africa/Libreville",
                "minute" => "-60"
            ),
            array(
                "code" => "TG",
                "name" => "Africa/Lome",
                "minute" => "-0"
            ),
            array(
                "code" => "AO",
                "name" => "Africa/Luanda",
                "minute" => "-60"
            ),
            array(
                "code" => "CD",
                "name" => "Africa/Lubumbashi",
                "minute" => "-120"
            ),
            array(
                "code" => "ZM",
                "name" => "Africa/Lusaka",
                "minute" => "-120"
            ),
            array(
                "code" => "GQ",
                "name" => "Africa/Malabo",
                "minute" => "-60"
            ),
            array(
                "code" => "MZ",
                "name" => "Africa/Maputo",
                "minute" => "-120"
            ),
            array(
                "code" => "LS",
                "name" => "Africa/Maseru",
                "minute" => "-120"
            ),
            array(
                "code" => "SZ",
                "name" => "Africa/Mbabane",
                "minute" => "-120"
            ),
            array(
                "code" => "SO",
                "name" => "Africa/Mogadishu",
                "minute" => "-180"
            ),
            array(
                "code" => "LR",
                "name" => "Africa/Monrovia",
                "minute" => "-0"
            ),
            array(
                "code" => "KE",
                "name" => "Africa/Nairobi",
                "minute" => "-180"
            ),
            array(
                "code" => "TD",
                "name" => "Africa/Ndjamena",
                "minute" => "-60"
            ),
            array(
                "code" => "NE",
                "name" => "Africa/Niamey",
                "minute" => "-60"
            ),
            array(
                "code" => "MR",
                "name" => "Africa/Nouakchott",
                "minute" => "-0"
            ),
            array(
                "code" => "BF",
                "name" => "Africa/Ouagadougou",
                "minute" => "-0"
            ),
            array(
                "code" => "BJ",
                "name" => "Africa/Porto-Novo",
                "minute" => "-60"
            ),
            array(
                "code" => "ST",
                "name" => "Africa/Sao_Tome",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Africa/Timbuktu",
                "minute" => "-0"
            ),
            array(
                "code" => "LY",
                "name" => "Africa/Tripoli",
                "minute" => "-120"
            ),
            array(
                "code" => "TN",
                "name" => "Africa/Tunis",
                "minute" => "-60"
            ),
            array(
                "code" => "NA",
                "name" => "Africa/Windhoek",
                "minute" => "-120"
            ),
            array(
                "code" => "US",
                "name" => "America/Adak",
                "minute" => "+600"
            ),
            array(
                "code" => "US",
                "name" => "America/Anchorage",
                "minute" => "+540"
            ),
            array(
                "code" => "AI",
                "name" => "America/Anguilla",
                "minute" => "+240"
            ),
            array(
                "code" => "AG",
                "name" => "America/Antigua",
                "minute" => "+240"
            ),
            array(
                "code" => "BR",
                "name" => "America/Araguaina",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Buenos_Aires",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Catamarca",
                "minute" => "+180"
            ),
            array(
                "code" => "",
                "name" => "America/Argentina/ComodRivadavia",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Cordoba",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Jujuy",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/La_Rioja",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Mendoza",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Rio_Gallegos",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Salta",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/San_Juan",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/San_Luis",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Tucuman",
                "minute" => "+180"
            ),
            array(
                "code" => "AR",
                "name" => "America/Argentina/Ushuaia",
                "minute" => "+180"
            ),
            array(
                "code" => "AW",
                "name" => "America/Aruba",
                "minute" => "+240"
            ),
            array(
                "code" => "PY",
                "name" => "America/Asuncion",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/Atikokan",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "America/Atka",
                "minute" => "+600"
            ),
            array(
                "code" => "BR",
                "name" => "America/Bahia",
                "minute" => "+180"
            ),
            array(
                "code" => "MX",
                "name" => "America/Bahia_Banderas",
                "minute" => "+360"
            ),
            array(
                "code" => "BB",
                "name" => "America/Barbados",
                "minute" => "+240"
            ),
            array(
                "code" => "BR",
                "name" => "America/Belem",
                "minute" => "+180"
            ),
            array(
                "code" => "BZ",
                "name" => "America/Belize",
                "minute" => "+360"
            ),
            array(
                "code" => "CA",
                "name" => "America/Blanc-Sablon",
                "minute" => "+240"
            ),
            array(
                "code" => "BR",
                "name" => "America/Boa_Vista",
                "minute" => "+240"
            ),
            array(
                "code" => "CO",
                "name" => "America/Bogota",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Boise",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "America/Buenos_Aires",
                "minute" => "+180"
            ),
            array(
                "code" => "CA",
                "name" => "America/Cambridge_Bay",
                "minute" => "+420"
            ),
            array(
                "code" => "BR",
                "name" => "America/Campo_Grande",
                "minute" => "+240"
            ),
            array(
                "code" => "MX",
                "name" => "America/Cancun",
                "minute" => "+300"
            ),
            array(
                "code" => "VE",
                "name" => "America/Caracas",
                "minute" => "+240"
            ),
            array(
                "code" => "",
                "name" => "America/Catamarca",
                "minute" => "+180"
            ),
            array(
                "code" => "GF",
                "name" => "America/Cayenne",
                "minute" => "+180"
            ),
            array(
                "code" => "KY",
                "name" => "America/Cayman",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Chicago",
                "minute" => "+360"
            ),
            array(
                "code" => "MX",
                "name" => "America/Chihuahua",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "America/Coral_Harbour",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "America/Cordoba",
                "minute" => "+180"
            ),
            array(
                "code" => "CR",
                "name" => "America/Costa_Rica",
                "minute" => "+360"
            ),
            array(
                "code" => "CA",
                "name" => "America/Creston",
                "minute" => "+420"
            ),
            array(
                "code" => "BR",
                "name" => "America/Cuiaba",
                "minute" => "+240"
            ),
            array(
                "code" => "CW",
                "name" => "America/Curacao",
                "minute" => "+240"
            ),
            array(
                "code" => "GL",
                "name" => "America/Danmarkshavn",
                "minute" => "-0"
            ),
            array(
                "code" => "CA",
                "name" => "America/Dawson",
                "minute" => "+480"
            ),
            array(
                "code" => "CA",
                "name" => "America/Dawson_Creek",
                "minute" => "+420"
            ),
            array(
                "code" => "US",
                "name" => "America/Denver",
                "minute" => "+420"
            ),
            array(
                "code" => "US",
                "name" => "America/Detroit",
                "minute" => "+300"
            ),
            array(
                "code" => "DM",
                "name" => "America/Dominica",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/Edmonton",
                "minute" => "+420"
            ),
            array(
                "code" => "BR",
                "name" => "America/Eirunepe",
                "minute" => "+300"
            ),
            array(
                "code" => "SV",
                "name" => "America/El_Salvador",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "America/Ensenada",
                "minute" => "+480"
            ),
            array(
                "code" => "CA",
                "name" => "America/Fort_Nelson",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "America/Fort_Wayne",
                "minute" => "+300"
            ),
            array(
                "code" => "BR",
                "name" => "America/Fortaleza",
                "minute" => "+180"
            ),
            array(
                "code" => "CA",
                "name" => "America/Glace_Bay",
                "minute" => "+240"
            ),
            array(
                "code" => "GL",
                "name" => "America/Godthab",
                "minute" => "+180"
            ),
            array(
                "code" => "CA",
                "name" => "America/Goose_Bay",
                "minute" => "+240"
            ),
            array(
                "code" => "TC",
                "name" => "America/Grand_Turk",
                "minute" => "+240"
            ),
            array(
                "code" => "GD",
                "name" => "America/Grenada",
                "minute" => "+240"
            ),
            array(
                "code" => "GP",
                "name" => "America/Guadeloupe",
                "minute" => "+240"
            ),
            array(
                "code" => "GT",
                "name" => "America/Guatemala",
                "minute" => "+360"
            ),
            array(
                "code" => "EC",
                "name" => "America/Guayaquil",
                "minute" => "+300"
            ),
            array(
                "code" => "GY",
                "name" => "America/Guyana",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/Halifax",
                "minute" => "+240"
            ),
            array(
                "code" => "CU",
                "name" => "America/Havana",
                "minute" => "+300"
            ),
            array(
                "code" => "MX",
                "name" => "America/Hermosillo",
                "minute" => "+420"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Indianapolis",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Knox",
                "minute" => "+360"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Marengo",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Petersburg",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Tell_City",
                "minute" => "+360"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Vevay",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Vincennes",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Indiana/Winamac",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "America/Indianapolis",
                "minute" => "+300"
            ),
            array(
                "code" => "CA",
                "name" => "America/Inuvik",
                "minute" => "+420"
            ),
            array(
                "code" => "CA",
                "name" => "America/Iqaluit",
                "minute" => "+300"
            ),
            array(
                "code" => "JM",
                "name" => "America/Jamaica",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "America/Jujuy",
                "minute" => "+180"
            ),
            array(
                "code" => "US",
                "name" => "America/Juneau",
                "minute" => "+540"
            ),
            array(
                "code" => "US",
                "name" => "America/Kentucky/Louisville",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Kentucky/Monticello",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "America/Knox_IN",
                "minute" => "+360"
            ),
            array(
                "code" => "BQ",
                "name" => "America/Kralendijk",
                "minute" => "+240"
            ),
            array(
                "code" => "BO",
                "name" => "America/La_Paz",
                "minute" => "+240"
            ),
            array(
                "code" => "PE",
                "name" => "America/Lima",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Los_Angeles",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "America/Louisville",
                "minute" => "+300"
            ),
            array(
                "code" => "SX",
                "name" => "America/Lower_Princes",
                "minute" => "+240"
            ),
            array(
                "code" => "BR",
                "name" => "America/Maceio",
                "minute" => "+180"
            ),
            array(
                "code" => "NI",
                "name" => "America/Managua",
                "minute" => "+360"
            ),
            array(
                "code" => "BR",
                "name" => "America/Manaus",
                "minute" => "+240"
            ),
            array(
                "code" => "MF",
                "name" => "America/Marigot",
                "minute" => "+240"
            ),
            array(
                "code" => "MQ",
                "name" => "America/Martinique",
                "minute" => "+240"
            ),
            array(
                "code" => "MX",
                "name" => "America/Matamoros",
                "minute" => "+360"
            ),
            array(
                "code" => "MX",
                "name" => "America/Mazatlan",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "America/Mendoza",
                "minute" => "+180"
            ),
            array(
                "code" => "US",
                "name" => "America/Menominee",
                "minute" => "+360"
            ),
            array(
                "code" => "MX",
                "name" => "America/Merida",
                "minute" => "+360"
            ),
            array(
                "code" => "US",
                "name" => "America/Metlakatla",
                "minute" => "+540"
            ),
            array(
                "code" => "MX",
                "name" => "America/Mexico_City",
                "minute" => "+360"
            ),
            array(
                "code" => "PM",
                "name" => "America/Miquelon",
                "minute" => "+180"
            ),
            array(
                "code" => "CA",
                "name" => "America/Moncton",
                "minute" => "+240"
            ),
            array(
                "code" => "MX",
                "name" => "America/Monterrey",
                "minute" => "+360"
            ),
            array(
                "code" => "UY",
                "name" => "America/Montevideo",
                "minute" => "+180"
            ),
            array(
                "code" => "",
                "name" => "America/Montreal",
                "minute" => "+300"
            ),
            array(
                "code" => "MS",
                "name" => "America/Montserrat",
                "minute" => "+240"
            ),
            array(
                "code" => "BS",
                "name" => "America/Nassau",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/New_York",
                "minute" => "+300"
            ),
            array(
                "code" => "CA",
                "name" => "America/Nipigon",
                "minute" => "+300"
            ),
            array(
                "code" => "US",
                "name" => "America/Nome",
                "minute" => "+540"
            ),
            array(
                "code" => "BR",
                "name" => "America/Noronha",
                "minute" => "+120"
            ),
            array(
                "code" => "US",
                "name" => "America/North_Dakota/Beulah",
                "minute" => "+360"
            ),
            array(
                "code" => "US",
                "name" => "America/North_Dakota/Center",
                "minute" => "+360"
            ),
            array(
                "code" => "US",
                "name" => "America/North_Dakota/New_Salem",
                "minute" => "+360"
            ),
            array(
                "code" => "MX",
                "name" => "America/Ojinaga",
                "minute" => "+420"
            ),
            array(
                "code" => "PA",
                "name" => "America/Panama",
                "minute" => "+300"
            ),
            array(
                "code" => "CA",
                "name" => "America/Pangnirtung",
                "minute" => "+300"
            ),
            array(
                "code" => "SR",
                "name" => "America/Paramaribo",
                "minute" => "+180"
            ),
            array(
                "code" => "US",
                "name" => "America/Phoenix",
                "minute" => "+420"
            ),
            array(
                "code" => "TT",
                "name" => "America/Port_of_Spain",
                "minute" => "+240"
            ),
            array(
                "code" => "HT",
                "name" => "America/Port-au-Prince",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "America/Porto_Acre",
                "minute" => "+300"
            ),
            array(
                "code" => "BR",
                "name" => "America/Porto_Velho",
                "minute" => "+240"
            ),
            array(
                "code" => "PR",
                "name" => "America/Puerto_Rico",
                "minute" => "+240"
            ),
            array(
                "code" => "CL",
                "name" => "America/Punta_Arenas",
                "minute" => "+180"
            ),
            array(
                "code" => "CA",
                "name" => "America/Rainy_River",
                "minute" => "+360"
            ),
            array(
                "code" => "CA",
                "name" => "America/Rankin_Inlet",
                "minute" => "+360"
            ),
            array(
                "code" => "BR",
                "name" => "America/Recife",
                "minute" => "+180"
            ),
            array(
                "code" => "CA",
                "name" => "America/Regina",
                "minute" => "+360"
            ),
            array(
                "code" => "CA",
                "name" => "America/Resolute",
                "minute" => "+360"
            ),
            array(
                "code" => "BR",
                "name" => "America/Rio_Branco",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "America/Rosario",
                "minute" => "+180"
            ),
            array(
                "code" => "",
                "name" => "America/Santa_Isabel",
                "minute" => "+480"
            ),
            array(
                "code" => "BR",
                "name" => "America/Santarem",
                "minute" => "+180"
            ),
            array(
                "code" => "CL",
                "name" => "America/Santiago",
                "minute" => "+240"
            ),
            array(
                "code" => "DO",
                "name" => "America/Santo_Domingo",
                "minute" => "+240"
            ),
            array(
                "code" => "BR",
                "name" => "America/Sao_Paulo",
                "minute" => "+180"
            ),
            array(
                "code" => "GL",
                "name" => "America/Scoresbysund",
                "minute" => "+60"
            ),
            array(
                "code" => "",
                "name" => "America/Shiprock",
                "minute" => "+420"
            ),
            array(
                "code" => "US",
                "name" => "America/Sitka",
                "minute" => "+540"
            ),
            array(
                "code" => "BL",
                "name" => "America/St_Barthelemy",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/St_Johns",
                "minute" => "+210"
            ),
            array(
                "code" => "KN",
                "name" => "America/St_Kitts",
                "minute" => "+240"
            ),
            array(
                "code" => "LC",
                "name" => "America/St_Lucia",
                "minute" => "+240"
            ),
            array(
                "code" => "VI",
                "name" => "America/St_Thomas",
                "minute" => "+240"
            ),
            array(
                "code" => "VC",
                "name" => "America/St_Vincent",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/Swift_Current",
                "minute" => "+360"
            ),
            array(
                "code" => "HN",
                "name" => "America/Tegucigalpa",
                "minute" => "+360"
            ),
            array(
                "code" => "GL",
                "name" => "America/Thule",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/Thunder_Bay",
                "minute" => "+300"
            ),
            array(
                "code" => "MX",
                "name" => "America/Tijuana",
                "minute" => "+480"
            ),
            array(
                "code" => "CA",
                "name" => "America/Toronto",
                "minute" => "+300"
            ),
            array(
                "code" => "VG",
                "name" => "America/Tortola",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/Vancouver",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "America/Virgin",
                "minute" => "+240"
            ),
            array(
                "code" => "CA",
                "name" => "America/Whitehorse",
                "minute" => "+480"
            ),
            array(
                "code" => "CA",
                "name" => "America/Winnipeg",
                "minute" => "+360"
            ),
            array(
                "code" => "US",
                "name" => "America/Yakutat",
                "minute" => "+540"
            ),
            array(
                "code" => "CA",
                "name" => "America/Yellowknife",
                "minute" => "+420"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Casey",
                "minute" => "-660"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Davis",
                "minute" => "-420"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/DumontDUrville",
                "minute" => "-600"
            ),
            array(
                "code" => "AU",
                "name" => "Antarctica/Macquarie",
                "minute" => "-660"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Mawson",
                "minute" => "-300"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/McMurdo",
                "minute" => "-720"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Palmer",
                "minute" => "+180"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Rothera",
                "minute" => "+180"
            ),
            array(
                "code" => "",
                "name" => "Antarctica/South_Pole",
                "minute" => "-720"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Syowa",
                "minute" => "-180"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Troll",
                "minute" => "-0"
            ),
            array(
                "code" => "AQ",
                "name" => "Antarctica/Vostok",
                "minute" => "-360"
            ),
            array(
                "code" => "SJ",
                "name" => "Arctic/Longyearbyen",
                "minute" => "-60"
            ),
            array(
                "code" => "YE",
                "name" => "Asia/Aden",
                "minute" => "-180"
            ),
            array(
                "code" => "KZ",
                "name" => "Asia/Almaty",
                "minute" => "-360"
            ),
            array(
                "code" => "JO",
                "name" => "Asia/Amman",
                "minute" => "-120"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Anadyr",
                "minute" => "-720"
            ),
            array(
                "code" => "KZ",
                "name" => "Asia/Aqtau",
                "minute" => "-300"
            ),
            array(
                "code" => "KZ",
                "name" => "Asia/Aqtobe",
                "minute" => "-300"
            ),
            array(
                "code" => "TM",
                "name" => "Asia/Ashgabat",
                "minute" => "-300"
            ),
            array(
                "code" => "",
                "name" => "Asia/Ashkhabad",
                "minute" => "-300"
            ),
            array(
                "code" => "KZ",
                "name" => "Asia/Atyrau",
                "minute" => "-300"
            ),
            array(
                "code" => "IQ",
                "name" => "Asia/Baghdad",
                "minute" => "-180"
            ),
            array(
                "code" => "BH",
                "name" => "Asia/Bahrain",
                "minute" => "-180"
            ),
            array(
                "code" => "AZ",
                "name" => "Asia/Baku",
                "minute" => "-240"
            ),
            array(
                "code" => "TH",
                "name" => "Asia/Bangkok",
                "minute" => "-420"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Barnaul",
                "minute" => "-420"
            ),
            array(
                "code" => "LB",
                "name" => "Asia/Beirut",
                "minute" => "-120"
            ),
            array(
                "code" => "KG",
                "name" => "Asia/Bishkek",
                "minute" => "-360"
            ),
            array(
                "code" => "BN",
                "name" => "Asia/Brunei",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Asia/Calcutta",
                "minute" => "-330"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Chita",
                "minute" => "-540"
            ),
            array(
                "code" => "MN",
                "name" => "Asia/Choibalsan",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Asia/Chongqing",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Asia/Chungking",
                "minute" => "-480"
            ),
            array(
                "code" => "LK",
                "name" => "Asia/Colombo",
                "minute" => "-330"
            ),
            array(
                "code" => "",
                "name" => "Asia/Dacca",
                "minute" => "-360"
            ),
            array(
                "code" => "SY",
                "name" => "Asia/Damascus",
                "minute" => "-120"
            ),
            array(
                "code" => "BD",
                "name" => "Asia/Dhaka",
                "minute" => "-360"
            ),
            array(
                "code" => "TL",
                "name" => "Asia/Dili",
                "minute" => "-540"
            ),
            array(
                "code" => "AE",
                "name" => "Asia/Dubai",
                "minute" => "-240"
            ),
            array(
                "code" => "TJ",
                "name" => "Asia/Dushanbe",
                "minute" => "-300"
            ),
            array(
                "code" => "CY",
                "name" => "Asia/Famagusta",
                "minute" => "-120"
            ),
            array(
                "code" => "PS",
                "name" => "Asia/Gaza",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "Asia/Harbin",
                "minute" => "-480"
            ),
            array(
                "code" => "PS",
                "name" => "Asia/Hebron",
                "minute" => "-120"
            ),
            array(
                "code" => "VN",
                "name" => "Asia/Ho_Chi_Minh",
                "minute" => "-420"
            ),
            array(
                "code" => "HK",
                "name" => "Asia/Hong_Kong",
                "minute" => "-480"
            ),
            array(
                "code" => "MN",
                "name" => "Asia/Hovd",
                "minute" => "-420"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Irkutsk",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Asia/Istanbul",
                "minute" => "-180"
            ),
            array(
                "code" => "ID",
                "name" => "Asia/Jakarta",
                "minute" => "-420"
            ),
            array(
                "code" => "ID",
                "name" => "Asia/Jayapura",
                "minute" => "-540"
            ),
            array(
                "code" => "IL",
                "name" => "Asia/Jerusalem",
                "minute" => "-120"
            ),
            array(
                "code" => "AF",
                "name" => "Asia/Kabul",
                "minute" => "-270"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Kamchatka",
                "minute" => "-720"
            ),
            array(
                "code" => "PK",
                "name" => "Asia/Karachi",
                "minute" => "-300"
            ),
            array(
                "code" => "",
                "name" => "Asia/Kashgar",
                "minute" => "-360"
            ),
            array(
                "code" => "NP",
                "name" => "Asia/Kathmandu",
                "minute" => "-345"
            ),
            array(
                "code" => "",
                "name" => "Asia/Katmandu",
                "minute" => "-345"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Khandyga",
                "minute" => "-540"
            ),
            array(
                "code" => "IN",
                "name" => "Asia/Kolkata",
                "minute" => "-330"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Krasnoyarsk",
                "minute" => "-420"
            ),
            array(
                "code" => "MY",
                "name" => "Asia/Kuala_Lumpur",
                "minute" => "-480"
            ),
            array(
                "code" => "MY",
                "name" => "Asia/Kuching",
                "minute" => "-480"
            ),
            array(
                "code" => "KW",
                "name" => "Asia/Kuwait",
                "minute" => "-180"
            ),
            array(
                "code" => "",
                "name" => "Asia/Macao",
                "minute" => "-480"
            ),
            array(
                "code" => "MO",
                "name" => "Asia/Macau",
                "minute" => "-480"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Magadan",
                "minute" => "-660"
            ),
            array(
                "code" => "ID",
                "name" => "Asia/Makassar",
                "minute" => "-480"
            ),
            array(
                "code" => "PH",
                "name" => "Asia/Manila",
                "minute" => "-480"
            ),
            array(
                "code" => "OM",
                "name" => "Asia/Muscat",
                "minute" => "-240"
            ),
            array(
                "code" => "CY",
                "name" => "Asia/Nicosia",
                "minute" => "-120"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Novokuznetsk",
                "minute" => "-420"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Novosibirsk",
                "minute" => "-420"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Omsk",
                "minute" => "-360"
            ),
            array(
                "code" => "KZ",
                "name" => "Asia/Oral",
                "minute" => "-300"
            ),
            array(
                "code" => "KH",
                "name" => "Asia/Phnom_Penh",
                "minute" => "-420"
            ),
            array(
                "code" => "ID",
                "name" => "Asia/Pontianak",
                "minute" => "-420"
            ),
            array(
                "code" => "KP",
                "name" => "Asia/Pyongyang",
                "minute" => "-510"
            ),
            array(
                "code" => "QA",
                "name" => "Asia/Qatar",
                "minute" => "-180"
            ),
            array(
                "code" => "KZ",
                "name" => "Asia/Qyzylorda",
                "minute" => "-360"
            ),
            array(
                "code" => "",
                "name" => "Asia/Rangoon",
                "minute" => "-390"
            ),
            array(
                "code" => "SA",
                "name" => "Asia/Riyadh",
                "minute" => "-180"
            ),
            array(
                "code" => "",
                "name" => "Asia/Saigon",
                "minute" => "-420"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Sakhalin",
                "minute" => "-660"
            ),
            array(
                "code" => "UZ",
                "name" => "Asia/Samarkand",
                "minute" => "-300"
            ),
            array(
                "code" => "KR",
                "name" => "Asia/Seoul",
                "minute" => "-540"
            ),
            array(
                "code" => "CN",
                "name" => "Asia/Shanghai",
                "minute" => "-480"
            ),
            array(
                "code" => "SG",
                "name" => "Asia/Singapore",
                "minute" => "-480"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Srednekolymsk",
                "minute" => "-660"
            ),
            array(
                "code" => "TW",
                "name" => "Asia/Taipei",
                "minute" => "-480"
            ),
            array(
                "code" => "UZ",
                "name" => "Asia/Tashkent",
                "minute" => "-300"
            ),
            array(
                "code" => "GE",
                "name" => "Asia/Tbilisi",
                "minute" => "-240"
            ),
            array(
                "code" => "IR",
                "name" => "Asia/Tehran",
                "minute" => "-210"
            ),
            array(
                "code" => "",
                "name" => "Asia/Tel_Aviv",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "Asia/Thimbu",
                "minute" => "-360"
            ),
            array(
                "code" => "BT",
                "name" => "Asia/Thimphu",
                "minute" => "-360"
            ),
            array(
                "code" => "JP",
                "name" => "Asia/Tokyo",
                "minute" => "-540"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Tomsk",
                "minute" => "-420"
            ),
            array(
                "code" => "",
                "name" => "Asia/Ujung_Pandang",
                "minute" => "-480"
            ),
            array(
                "code" => "MN",
                "name" => "Asia/Ulaanbaatar",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Asia/Ulan_Bator",
                "minute" => "-480"
            ),
            array(
                "code" => "CN",
                "name" => "Asia/Urumqi",
                "minute" => "-360"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Ust-Nera",
                "minute" => "-600"
            ),
            array(
                "code" => "LA",
                "name" => "Asia/Vientiane",
                "minute" => "-420"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Vladivostok",
                "minute" => "-600"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Yakutsk",
                "minute" => "-540"
            ),
            array(
                "code" => "MM",
                "name" => "Asia/Yangon",
                "minute" => "-390"
            ),
            array(
                "code" => "RU",
                "name" => "Asia/Yekaterinburg",
                "minute" => "-300"
            ),
            array(
                "code" => "AM",
                "name" => "Asia/Yerevan",
                "minute" => "-240"
            ),
            array(
                "code" => "PT",
                "name" => "Atlantic/Azores",
                "minute" => "+60"
            ),
            array(
                "code" => "BM",
                "name" => "Atlantic/Bermuda",
                "minute" => "+240"
            ),
            array(
                "code" => "ES",
                "name" => "Atlantic/Canary",
                "minute" => "-0"
            ),
            array(
                "code" => "CV",
                "name" => "Atlantic/Cape_Verde",
                "minute" => "+60"
            ),
            array(
                "code" => "",
                "name" => "Atlantic/Faeroe",
                "minute" => "-0"
            ),
            array(
                "code" => "FO",
                "name" => "Atlantic/Faroe",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Atlantic/Jan_Mayen",
                "minute" => "-60"
            ),
            array(
                "code" => "PT",
                "name" => "Atlantic/Madeira",
                "minute" => "-0"
            ),
            array(
                "code" => "IS",
                "name" => "Atlantic/Reykjavik",
                "minute" => "-0"
            ),
            array(
                "code" => "GS",
                "name" => "Atlantic/South_Georgia",
                "minute" => "+120"
            ),
            array(
                "code" => "SH",
                "name" => "Atlantic/St_Helena",
                "minute" => "-0"
            ),
            array(
                "code" => "FK",
                "name" => "Atlantic/Stanley",
                "minute" => "+180"
            ),
            array(
                "code" => "",
                "name" => "Australia/ACT",
                "minute" => "-600"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Adelaide",
                "minute" => "-570"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Brisbane",
                "minute" => "-600"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Broken_Hill",
                "minute" => "-570"
            ),
            array(
                "code" => "",
                "name" => "Australia/Canberra",
                "minute" => "-600"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Currie",
                "minute" => "-600"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Darwin",
                "minute" => "-570"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Eucla",
                "minute" => "-525"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Hobart",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Australia/LHI",
                "minute" => "-630"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Lindeman",
                "minute" => "-600"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Lord_Howe",
                "minute" => "-630"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Melbourne",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Australia/North",
                "minute" => "-570"
            ),
            array(
                "code" => "",
                "name" => "Australia/NSW",
                "minute" => "-600"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Perth",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Australia/Queensland",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Australia/South",
                "minute" => "-570"
            ),
            array(
                "code" => "AU",
                "name" => "Australia/Sydney",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Australia/Tasmania",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Australia/Victoria",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Australia/West",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Australia/Yancowinna",
                "minute" => "-570"
            ),
            array(
                "code" => "",
                "name" => "Brazil/Acre",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "Brazil/DeNoronha",
                "minute" => "+120"
            ),
            array(
                "code" => "",
                "name" => "Brazil/East",
                "minute" => "+180"
            ),
            array(
                "code" => "",
                "name" => "Brazil/West",
                "minute" => "+240"
            ),
            array(
                "code" => "",
                "name" => "Canada/Atlantic",
                "minute" => "+240"
            ),
            array(
                "code" => "",
                "name" => "Canada/Central",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "Canada/Eastern",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "Canada/Mountain",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "Canada/Newfoundland",
                "minute" => "+210"
            ),
            array(
                "code" => "",
                "name" => "Canada/Pacific",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "Canada/Saskatchewan",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "Canada/Yukon",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "CET",
                "minute" => "-60"
            ),
            array(
                "code" => "",
                "name" => "Chile/Continental",
                "minute" => "+240"
            ),
            array(
                "code" => "",
                "name" => "Chile/EasterIsland",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "CST6CDT",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "Cuba",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "EET",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "Egypt",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "Eire",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "EST",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "EST5EDT",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+0",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+1",
                "minute" => "+60"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+10",
                "minute" => "+600"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+11",
                "minute" => "+660"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+12",
                "minute" => "+720"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+2",
                "minute" => "+120"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+3",
                "minute" => "+180"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+4",
                "minute" => "+240"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+5",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+6",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+7",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+8",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT+9",
                "minute" => "+540"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT0",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-0",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-1",
                "minute" => "-60"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-10",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-11",
                "minute" => "-660"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-12",
                "minute" => "-720"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-13",
                "minute" => "-780"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-14",
                "minute" => "-840"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-2",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-3",
                "minute" => "-180"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-4",
                "minute" => "-240"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-5",
                "minute" => "-300"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-6",
                "minute" => "-360"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-7",
                "minute" => "-420"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-8",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Etc/GMT-9",
                "minute" => "-540"
            ),
            array(
                "code" => "",
                "name" => "Etc/Greenwich",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/UCT",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/Universal",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/UTC",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Etc/Zulu",
                "minute" => "-0"
            ),
            array(
                "code" => "NL",
                "name" => "Europe/Amsterdam",
                "minute" => "-60"
            ),
            array(
                "code" => "AD",
                "name" => "Europe/Andorra",
                "minute" => "-60"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Astrakhan",
                "minute" => "-240"
            ),
            array(
                "code" => "GR",
                "name" => "Europe/Athens",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "Europe/Belfast",
                "minute" => "-0"
            ),
            array(
                "code" => "RS",
                "name" => "Europe/Belgrade",
                "minute" => "-60"
            ),
            array(
                "code" => "DE",
                "name" => "Europe/Berlin",
                "minute" => "-60"
            ),
            array(
                "code" => "SK",
                "name" => "Europe/Bratislava",
                "minute" => "-60"
            ),
            array(
                "code" => "BE",
                "name" => "Europe/Brussels",
                "minute" => "-60"
            ),
            array(
                "code" => "RO",
                "name" => "Europe/Bucharest",
                "minute" => "-120"
            ),
            array(
                "code" => "HU",
                "name" => "Europe/Budapest",
                "minute" => "-60"
            ),
            array(
                "code" => "DE",
                "name" => "Europe/Busingen",
                "minute" => "-60"
            ),
            array(
                "code" => "MD",
                "name" => "Europe/Chisinau",
                "minute" => "-120"
            ),
            array(
                "code" => "DK",
                "name" => "Europe/Copenhagen",
                "minute" => "-60"
            ),
            array(
                "code" => "IE",
                "name" => "Europe/Dublin",
                "minute" => "-0"
            ),
            array(
                "code" => "GI",
                "name" => "Europe/Gibraltar",
                "minute" => "-60"
            ),
            array(
                "code" => "GG",
                "name" => "Europe/Guernsey",
                "minute" => "-0"
            ),
            array(
                "code" => "FI",
                "name" => "Europe/Helsinki",
                "minute" => "-120"
            ),
            array(
                "code" => "IM",
                "name" => "Europe/Isle_of_Man",
                "minute" => "-0"
            ),
            array(
                "code" => "TR",
                "name" => "Europe/Istanbul",
                "minute" => "-180"
            ),
            array(
                "code" => "JE",
                "name" => "Europe/Jersey",
                "minute" => "-0"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Kaliningrad",
                "minute" => "-120"
            ),
            array(
                "code" => "UA",
                "name" => "Europe/Kiev",
                "minute" => "-120"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Kirov",
                "minute" => "-180"
            ),
            array(
                "code" => "PT",
                "name" => "Europe/Lisbon",
                "minute" => "-0"
            ),
            array(
                "code" => "SI",
                "name" => "Europe/Ljubljana",
                "minute" => "-60"
            ),
            array(
                "code" => "GB",
                "name" => "Europe/London",
                "minute" => "-0"
            ),
            array(
                "code" => "LU",
                "name" => "Europe/Luxembourg",
                "minute" => "-60"
            ),
            array(
                "code" => "ES",
                "name" => "Europe/Madrid",
                "minute" => "-60"
            ),
            array(
                "code" => "MT",
                "name" => "Europe/Malta",
                "minute" => "-60"
            ),
            array(
                "code" => "AX",
                "name" => "Europe/Mariehamn",
                "minute" => "-120"
            ),
            array(
                "code" => "BY",
                "name" => "Europe/Minsk",
                "minute" => "-180"
            ),
            array(
                "code" => "MC",
                "name" => "Europe/Monaco",
                "minute" => "-60"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Moscow",
                "minute" => "-180"
            ),
            array(
                "code" => "",
                "name" => "Europe/Nicosia",
                "minute" => "-120"
            ),
            array(
                "code" => "NO",
                "name" => "Europe/Oslo",
                "minute" => "-60"
            ),
            array(
                "code" => "FR",
                "name" => "Europe/Paris",
                "minute" => "-60"
            ),
            array(
                "code" => "ME",
                "name" => "Europe/Podgorica",
                "minute" => "-60"
            ),
            array(
                "code" => "CZ",
                "name" => "Europe/Prague",
                "minute" => "-60"
            ),
            array(
                "code" => "LV",
                "name" => "Europe/Riga",
                "minute" => "-120"
            ),
            array(
                "code" => "IT",
                "name" => "Europe/Rome",
                "minute" => "-60"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Samara",
                "minute" => "-240"
            ),
            array(
                "code" => "SM",
                "name" => "Europe/San_Marino",
                "minute" => "-60"
            ),
            array(
                "code" => "BA",
                "name" => "Europe/Sarajevo",
                "minute" => "-60"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Saratov",
                "minute" => "-240"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Simferopol",
                "minute" => "-180"
            ),
            array(
                "code" => "MK",
                "name" => "Europe/Skopje",
                "minute" => "-60"
            ),
            array(
                "code" => "BG",
                "name" => "Europe/Sofia",
                "minute" => "-120"
            ),
            array(
                "code" => "SE",
                "name" => "Europe/Stockholm",
                "minute" => "-60"
            ),
            array(
                "code" => "EE",
                "name" => "Europe/Tallinn",
                "minute" => "-120"
            ),
            array(
                "code" => "AL",
                "name" => "Europe/Tirane",
                "minute" => "-60"
            ),
            array(
                "code" => "",
                "name" => "Europe/Tiraspol",
                "minute" => "-120"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Ulyanovsk",
                "minute" => "-240"
            ),
            array(
                "code" => "UA",
                "name" => "Europe/Uzhgorod",
                "minute" => "-120"
            ),
            array(
                "code" => "LI",
                "name" => "Europe/Vaduz",
                "minute" => "-60"
            ),
            array(
                "code" => "VA",
                "name" => "Europe/Vatican",
                "minute" => "-60"
            ),
            array(
                "code" => "AT",
                "name" => "Europe/Vienna",
                "minute" => "-60"
            ),
            array(
                "code" => "LT",
                "name" => "Europe/Vilnius",
                "minute" => "-120"
            ),
            array(
                "code" => "RU",
                "name" => "Europe/Volgograd",
                "minute" => "-180"
            ),
            array(
                "code" => "PL",
                "name" => "Europe/Warsaw",
                "minute" => "-60"
            ),
            array(
                "code" => "HR",
                "name" => "Europe/Zagreb",
                "minute" => "-60"
            ),
            array(
                "code" => "UA",
                "name" => "Europe/Zaporozhye",
                "minute" => "-120"
            ),
            array(
                "code" => "CH",
                "name" => "Europe/Zurich",
                "minute" => "-60"
            ),
            array(
                "code" => "",
                "name" => "GB",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "GB-Eire",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "GMT",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "GMT+0",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "GMT0",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "GMT−0",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Greenwich",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Hongkong",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "HST",
                "minute" => "+600"
            ),
            array(
                "code" => "",
                "name" => "Iceland",
                "minute" => "-0"
            ),
            array(
                "code" => "MG",
                "name" => "Indian/Antananarivo",
                "minute" => "-180"
            ),
            array(
                "code" => "IO",
                "name" => "Indian/Chagos",
                "minute" => "-360"
            ),
            array(
                "code" => "CX",
                "name" => "Indian/Christmas",
                "minute" => "-420"
            ),
            array(
                "code" => "CC",
                "name" => "Indian/Cocos",
                "minute" => "-390"
            ),
            array(
                "code" => "KM",
                "name" => "Indian/Comoro",
                "minute" => "-180"
            ),
            array(
                "code" => "TF",
                "name" => "Indian/Kerguelen",
                "minute" => "-300"
            ),
            array(
                "code" => "SC",
                "name" => "Indian/Mahe",
                "minute" => "-240"
            ),
            array(
                "code" => "MV",
                "name" => "Indian/Maldives",
                "minute" => "-300"
            ),
            array(
                "code" => "MU",
                "name" => "Indian/Mauritius",
                "minute" => "-240"
            ),
            array(
                "code" => "YT",
                "name" => "Indian/Mayotte",
                "minute" => "-180"
            ),
            array(
                "code" => "RE",
                "name" => "Indian/Reunion",
                "minute" => "-240"
            ),
            array(
                "code" => "",
                "name" => "Iran",
                "minute" => "-210"
            ),
            array(
                "code" => "",
                "name" => "Israel",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "Jamaica",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "Japan",
                "minute" => "-540"
            ),
            array(
                "code" => "",
                "name" => "Kwajalein",
                "minute" => "-720"
            ),
            array(
                "code" => "",
                "name" => "Libya",
                "minute" => "-120"
            ),
            array(
                "code" => "",
                "name" => "MET",
                "minute" => "-60"
            ),
            array(
                "code" => "",
                "name" => "Mexico/BajaNorte",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "Mexico/BajaSur",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "Mexico/General",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "MST",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "MST7MDT",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "Navajo",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "NZ",
                "minute" => "-720"
            ),
            array(
                "code" => "",
                "name" => "NZ-CHAT",
                "minute" => "-765"
            ),
            array(
                "code" => "WS",
                "name" => "Pacific/Apia",
                "minute" => "-780"
            ),
            array(
                "code" => "NZ",
                "name" => "Pacific/Auckland",
                "minute" => "-720"
            ),
            array(
                "code" => "PG",
                "name" => "Pacific/Bougainville",
                "minute" => "-660"
            ),
            array(
                "code" => "NZ",
                "name" => "Pacific/Chatham",
                "minute" => "-765"
            ),
            array(
                "code" => "FM",
                "name" => "Pacific/Chuuk",
                "minute" => "-600"
            ),
            array(
                "code" => "CL",
                "name" => "Pacific/Easter",
                "minute" => "+360"
            ),
            array(
                "code" => "VU",
                "name" => "Pacific/Efate",
                "minute" => "-660"
            ),
            array(
                "code" => "KI",
                "name" => "Pacific/Enderbury",
                "minute" => "-780"
            ),
            array(
                "code" => "TK",
                "name" => "Pacific/Fakaofo",
                "minute" => "-780"
            ),
            array(
                "code" => "FJ",
                "name" => "Pacific/Fiji",
                "minute" => "-720"
            ),
            array(
                "code" => "TV",
                "name" => "Pacific/Funafuti",
                "minute" => "-720"
            ),
            array(
                "code" => "EC",
                "name" => "Pacific/Galapagos",
                "minute" => "+360"
            ),
            array(
                "code" => "PF",
                "name" => "Pacific/Gambier",
                "minute" => "+540"
            ),
            array(
                "code" => "SB",
                "name" => "Pacific/Guadalcanal",
                "minute" => "-660"
            ),
            array(
                "code" => "GU",
                "name" => "Pacific/Guam",
                "minute" => "-600"
            ),
            array(
                "code" => "US",
                "name" => "Pacific/Honolulu",
                "minute" => "+600"
            ),
            array(
                "code" => "",
                "name" => "Pacific/Johnston",
                "minute" => "+600"
            ),
            array(
                "code" => "KI",
                "name" => "Pacific/Kiritimati",
                "minute" => "-840"
            ),
            array(
                "code" => "FM",
                "name" => "Pacific/Kosrae",
                "minute" => "-660"
            ),
            array(
                "code" => "MH",
                "name" => "Pacific/Kwajalein",
                "minute" => "-720"
            ),
            array(
                "code" => "MH",
                "name" => "Pacific/Majuro",
                "minute" => "-720"
            ),
            array(
                "code" => "PF",
                "name" => "Pacific/Marquesas",
                "minute" => "+570"
            ),
            array(
                "code" => "UM",
                "name" => "Pacific/Midway",
                "minute" => "+660"
            ),
            array(
                "code" => "NR",
                "name" => "Pacific/Nauru",
                "minute" => "-720"
            ),
            array(
                "code" => "NU",
                "name" => "Pacific/Niue",
                "minute" => "+660"
            ),
            array(
                "code" => "NF",
                "name" => "Pacific/Norfolk",
                "minute" => "-660"
            ),
            array(
                "code" => "NC",
                "name" => "Pacific/Noumea",
                "minute" => "-660"
            ),
            array(
                "code" => "AS",
                "name" => "Pacific/Pago_Pago",
                "minute" => "+660"
            ),
            array(
                "code" => "PW",
                "name" => "Pacific/Palau",
                "minute" => "-540"
            ),
            array(
                "code" => "PN",
                "name" => "Pacific/Pitcairn",
                "minute" => "+480"
            ),
            array(
                "code" => "FM",
                "name" => "Pacific/Pohnpei",
                "minute" => "-660"
            ),
            array(
                "code" => "",
                "name" => "Pacific/Ponape",
                "minute" => "-660"
            ),
            array(
                "code" => "PG",
                "name" => "Pacific/Port_Moresby",
                "minute" => "-600"
            ),
            array(
                "code" => "CK",
                "name" => "Pacific/Rarotonga",
                "minute" => "+600"
            ),
            array(
                "code" => "MP",
                "name" => "Pacific/Saipan",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Pacific/Samoa",
                "minute" => "+660"
            ),
            array(
                "code" => "PF",
                "name" => "Pacific/Tahiti",
                "minute" => "+600"
            ),
            array(
                "code" => "KI",
                "name" => "Pacific/Tarawa",
                "minute" => "-720"
            ),
            array(
                "code" => "TO",
                "name" => "Pacific/Tongatapu",
                "minute" => "-780"
            ),
            array(
                "code" => "",
                "name" => "Pacific/Truk",
                "minute" => "-600"
            ),
            array(
                "code" => "UM",
                "name" => "Pacific/Wake",
                "minute" => "-720"
            ),
            array(
                "code" => "WF",
                "name" => "Pacific/Wallis",
                "minute" => "-720"
            ),
            array(
                "code" => "",
                "name" => "Pacific/Yap",
                "minute" => "-600"
            ),
            array(
                "code" => "",
                "name" => "Poland",
                "minute" => "-60"
            ),
            array(
                "code" => "",
                "name" => "Portugal",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "PRC",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "PST8PDT",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "ROC",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "ROK",
                "minute" => "-540"
            ),
            array(
                "code" => "",
                "name" => "Singapore",
                "minute" => "-480"
            ),
            array(
                "code" => "",
                "name" => "Turkey",
                "minute" => "-180"
            ),
            array(
                "code" => "",
                "name" => "UCT",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "Universal",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "US/Alaska",
                "minute" => "+540"
            ),
            array(
                "code" => "",
                "name" => "US/Aleutian",
                "minute" => "+600"
            ),
            array(
                "code" => "",
                "name" => "US/Arizona",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "US/Central",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "US/Eastern",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "US/East-Indiana",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "US/Hawaii",
                "minute" => "+600"
            ),
            array(
                "code" => "",
                "name" => "US/Indiana-Starke",
                "minute" => "+360"
            ),
            array(
                "code" => "",
                "name" => "US/Michigan",
                "minute" => "+300"
            ),
            array(
                "code" => "",
                "name" => "US/Mountain",
                "minute" => "+420"
            ),
            array(
                "code" => "",
                "name" => "US/Pacific",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "US/Pacific-New",
                "minute" => "+480"
            ),
            array(
                "code" => "",
                "name" => "US/Samoa",
                "minute" => "+660"
            ),
            array(
                "code" => "",
                "name" => "UTC",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "WET",
                "minute" => "-0"
            ),
            array(
                "code" => "",
                "name" => "W-SU",
                "minute" => "-180"
            ),
            array(
                "code" => "",
                "name" => "Zulu",
                "minute" => "-0"
            ),
        );

        DB::beginTransaction();
        $return = true;
        for ($i = 0; $i < count($data); $i++) {
            $request = new \stdClass;
            $request->code = $data[$i]['code'];
            $request->name = $data[$i]['name'];
            $request->minute = $data[$i]['minute'];
            $request->user_id = $user_id;

            $timezone = new TimeZone;
            if (count($timezone->getTimeZoneByName($request->name)) == 0) {
                $result = $timezone->addTimeZone($request);
                if ($result == false) {
                    $return = $result;
                    break;
                }
            }
        }
        if ($return) {
            DB::commit();
        } else {
            DB::rollBack();
        }
    }
}
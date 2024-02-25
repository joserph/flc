<?php

namespace App\Services;

use App\Models\Farm;
use Filament\Forms;

final class FarmForm
{
    protected static array $statuses = [
        'activa'        => 'Activa',
        'suspendida'    => 'Suspendida',
        'cerrada'       => 'Cerrada',
    ];

    public static function schema(): array
    {
        return [
            Forms\Components\Grid::make(4)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->autofocus()
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->columnSpan(2)
                        ->label('Nombre de la finca')
                        ->unique(ignoreRecord: true)
                        ->required(),
                    Forms\Components\TextInput::make('tradename')
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->label('Nombre Comercial'),
                    Forms\Components\TextInput::make('ruc')
                        ->unique(ignoreRecord: true)
                        ->numeric()
                        ->maxLength(13)
                        ->label('RUC')
                        ->required(),
                    Forms\Components\TextInput::make('phone')
                        ->numeric()
                        ->prefix('+')
                        ->label('Telefono'),
                    Forms\Components\TextInput::make('cell_phone')
                        ->numeric()
                        ->prefix('+')
                        ->label('Celular'),
                    Forms\Components\TextInput::make('email')
                        ->label('Correo')
                        ->required(),
                    Forms\Components\TextInput::make('address')
                        ->columnSpan(2)
                        ->label('Direccion')
                        ->required(),
                    Forms\Components\TextInput::make('state')
                        ->label('Estado')
                        ->required(),
                    Forms\Components\TextInput::make('city')
                        ->label('Ciudad')
                        ->required(),
                    Forms\Components\Select::make('country')
                        ->options(self::$countries)
                        ->default('ECUADOR')
                        ->searchable()
                        ->label('Pais')
                        ->required(),
                    Forms\Components\TextInput::make('agroquality_code')
                        ->label('Codigo Agricultura'),
                    Forms\Components\Select::make('status')
                        ->options(self::$statuses)
                        ->required()
                ])
        ];
    }

    protected static array $countries =  [
        'AFGANISTÁN' => 'AFGANISTÁN',
        'ALBANIA' => 'ALBANIA',
        'ALEMANIA' => 'ALEMANIA',
        'ANDORRA' => 'ANDORRA',
        'ANGOLA' => 'ANGOLA',
        'ANTIGUA Y BARBUDA' => 'ANTIGUA Y BARBUDA',
        'ARABIA SAUDITA' => 'ARABIA SAUDITA',
        'ARGELIA' => 'ARGELIA',
        'ARGENTINA' => 'ARGENTINA',
        'ARMENIA' => 'ARMENIA',
        'AUSTRALIA' => 'AUSTRALIA',
        'AUSTRIA' => 'AUSTRIA',
        'AZERBAIYÁN' => 'AZERBAIYÁN',
        'BAHAMAS' => 'BAHAMAS',
        'BANGLADÉS' => 'BANGLADÉS',
        'BARBADOS' => 'BARBADOS',
        'BARÉIN' => 'BARÉIN',
        'BÉLGICA' => 'BÉLGICA',
        'BELICE' => 'BELICE',
        'BENÍN' => 'BENÍN',
        'BIELORRUSIA' => 'BIELORRUSIA',
        'BIRMANIA/MYANMAR' => 'BIRMANIA/MYANMAR',
        'BOLIVIA' => 'BOLIVIA',
        'BOSNIA Y HERZEGOVINA' => 'BOSNIA Y HERZEGOVINA',
        'BOTSUANA' => 'BOTSUANA',
        'BRASIL' => 'BRASIL',
        'BRUNÉI' => 'BRUNÉI',
        'BULGARIA' => 'BULGARIA',
        'BURKINA FASO' => 'BURKINA FASO',
        'BURUNDI' => 'BURUNDI',
        'BUTÁN' => 'BUTÁN',
        'CABO VERDE' => 'CABO VERDE',
        'CAMBOYA' => 'CAMBOYA',
        'CAMERÚN' => 'CAMERÚN',
        'CANADÁ' => 'CANADÁ',
        'CATAR' => 'CATAR',
        'CHAD' => 'CHAD',
        'CHILE' => 'CHILE',
        'CHINA' => 'CHINA',
        'CHIPRE' => 'CHIPRE',
        'CIUDAD DEL VATICANO' => 'CIUDAD DEL VATICANO',
        'COLOMBIA' => 'COLOMBIA',
        'COMORAS' => 'COMORAS',
        'COREA DEL NORTE' => 'COREA DEL NORTE',
        'COREA DEL SUR' => 'COREA DEL SUR',
        'COSTA DE MARFIL' => 'COSTA DE MARFIL',
        'COSTA RICA' => 'COSTA RICA',
        'CROACIA' => 'CROACIA',
        'CUBA' => 'CUBA',
        'DINAMARCA' => 'DINAMARCA',
        'DOMINICA' => 'DOMINICA',
        'ECUADOR' => 'ECUADOR',
        'EGIPTO' => 'EGIPTO',
        'EL SALVADOR' => 'EL SALVADOR',
        'EMIRATOS ÁRABES UNIDOS' => 'EMIRATOS ÁRABES UNIDOS',
        'ERITREA' => 'ERITREA',
        'ESLOVAQUIA' => 'ESLOVAQUIA',
        'ESLOVENIA' => 'ESLOVENIA',
        'ESPAÑA' => 'ESPAÑA',
        'ESTADOS UNIDOS' => 'ESTADOS UNIDOS',
        'ESTONIA' => 'ESTONIA',
        'ETIOPÍA' => 'ETIOPÍA',
        'FILIPINAS' => 'FILIPINAS',
        'FINLANDIA' => 'FINLANDIA',
        'FIYI' => 'FIYI',
        'FRANCIA' => 'FRANCIA',
        'GABÓN' => 'GABÓN',
        'GAMBIA' => 'GAMBIA',
        'GEORGIA' => 'GEORGIA',
        'GHANA' => 'GHANA',
        'GRANADA' => 'GRANADA',
        'GRECIA' => 'GRECIA',
        'GUATEMALA' => 'GUATEMALA',
        'GUYANA' => 'GUYANA',
        'GUINEA' => 'GUINEA',
        'GUINEA ECUATORIAL' => 'GUINEA ECUATORIAL',
        'GUINEA-BISÁU' => 'GUINEA-BISÁU',
        'HAITÍ' => 'HAITÍ',
        'HONDURAS' => 'HONDURAS',
        'HUNGRÍA' => 'HUNGRÍA',
        'INDIA' => 'INDIA',
        'INDONESIA' => 'INDONESIA',
        'IRAK' => 'IRAK',
        'IRÁN' => 'IRÁN',
        'IRLANDA' => 'IRLANDA',
        'ISLANDIA' => 'ISLANDIA',
        'ISLAS MARSHALL' => 'ISLAS MARSHALL',
        'ISLAS SALOMÓN' => 'ISLAS SALOMÓN',
        'ISRAEL' => 'ISRAEL',
        'ITALIA' => 'ITALIA',
        'JAMAICA' => 'JAMAICA',
        'JAPÓN' => 'JAPÓN',
        'JORDANIA' => 'JORDANIA',
        'KAZAJISTÁN' => 'KAZAJISTÁN',
        'KENIA' => 'KENIA',
        'KIRGUISTÁN' => 'KIRGUISTÁN',
        'KIRIBATI' => 'KIRIBATI',
        'KUWAIT' => 'KUWAIT',
        'LAOS' => 'LAOS',
        'LESOTO' => 'LESOTO',
        'LETONIA' => 'LETONIA',
        'LÍBANO' => 'LÍBANO',
        'LIBERIA' => 'LIBERIA',
        'LIBIA' => 'LIBIA',
        'LIECHTENSTEIN' => 'LIECHTENSTEIN',
        'LITUANIA' => 'LITUANIA',
        'LUXEMBURGO' => 'LUXEMBURGO',
        'MACEDONIA DEL NORTE' => 'MACEDONIA DEL NORTE',
        'MADAGASCAR' => 'MADAGASCAR',
        'MALASIA' => 'MALASIA',
        'MALAUI' => 'MALAUI',
        'MALDIVAS' => 'MALDIVAS',
        'MALÍ' => 'MALÍ',
        'MALTA' => 'MALTA',
        'MARRUECOS' => 'MARRUECOS',
        'MAURICIO' => 'MAURICIO',
        'MAURITANIA' => 'MAURITANIA',
        'MÉXICO' => 'MÉXICO',
        'MICRONESIA' => 'MICRONESIA',
        'MOLDAVIA' => 'MOLDAVIA',
        'MÓNACO' => 'MÓNACO',
        'MONGOLIA' => 'MONGOLIA',
        'MONTENEGRO' => 'MONTENEGRO',
        'MOZAMBIQUE' => 'MOZAMBIQUE',
        'NAMIBIA' => 'NAMIBIA',
        'NAURU' => 'NAURU',
        'NEPAL' => 'NEPAL',
        'NICARAGUA' => 'NICARAGUA',
        'NÍGER' => 'NÍGER',
        'NIGERIA' => 'NIGERIA',
        'NORUEGA' => 'NORUEGA',
        'NUEVA ZELANDA' => 'NUEVA ZELANDA',
        'OMÁN' => 'OMÁN',
        'PAÍSES BAJOS' => 'PAÍSES BAJOS',
        'PAKISTÁN' => 'PAKISTÁN',
        'PALAOS' => 'PALAOS',
        'PANAMÁ' => 'PANAMÁ',
        'PAPÚA NUEVA GUINEA' => 'PAPÚA NUEVA GUINEA',
        'PARAGUAY' => 'PARAGUAY',
        'PERÚ' => 'PERÚ',
        'POLONIA' => 'POLONIA',
        'PORTUGAL' => 'PORTUGAL',
        'REINO UNIDO' => 'REINO UNIDO',
        'REPÚBLICA CENTROAFRICANA' => 'REPÚBLICA CENTROAFRICANA',
        'REPÚBLICA CHECA' => 'REPÚBLICA CHECA',
        'REPÚBLICA DEL CONGO' => 'REPÚBLICA DEL CONGO',
        'REPÚBLICA DEMOCRÁTICA DEL CONGO' => 'REPÚBLICA DEMOCRÁTICA DEL CONGO',
        'REPÚBLICA DOMINICANA' => 'REPÚBLICA DOMINICANA',
        'REPÚBLICA SUDAFRICANA' => 'REPÚBLICA SUDAFRICANA',
        'RUANDA' => 'RUANDA',
        'RUMANÍA' => 'RUMANÍA',
        'RUSIA' => 'RUSIA',
        'SAMOA' => 'SAMOA',
        'SAN CRISTÓBAL Y NIEVES' => 'SAN CRISTÓBAL Y NIEVES',
        'SAN MARINO' => 'SAN MARINO',
        'SAN VICENTE Y LAS GRANADINAS' => 'SAN VICENTE Y LAS GRANADINAS',
        'SANTA LUCÍA' => 'SANTA LUCÍA',
        'SANTO TOMÉ Y PRÍNCIPE' => 'SANTO TOMÉ Y PRÍNCIPE',
        'SENEGAL' => 'SENEGAL',
        'SERBIA' => 'SERBIA',
        'SEYCHELLES' => 'SEYCHELLES',
        'SIERRA LEONA' => 'SIERRA LEONA',
        'SINGAPUR' => 'SINGAPUR',
        'SIRIA' => 'SIRIA',
        'SOMALIA' => 'SOMALIA',
        'SRI LANKA' => 'SRI LANKA',
        'SUAZILANDIA' => 'SUAZILANDIA',
        'SUDÁN' => 'SUDÁN',
        'SUDÁN DEL SUR' => 'SUDÁN DEL SUR',
        'SUECIA' => 'SUECIA',
        'SUIZA' => 'SUIZA',
        'SURINAM' => 'SURINAM',
        'TAILANDIA' => 'TAILANDIA',
        'TANZANIA' => 'TANZANIA',
        'TAYIKISTÁN' => 'TAYIKISTÁN',
        'TIMOR ORIENTAL' => 'TIMOR ORIENTAL',
        'TOGO' => 'TOGO',
        'TONGA' => 'TONGA',
        'TRINIDAD Y TOBAGO' => 'TRINIDAD Y TOBAGO',
        'TÚNEZ' => 'TÚNEZ',
        'TURKMENISTÁN' => 'TURKMENISTÁN',
        'TURQUÍA' => 'TURQUÍA',
        'TUVALU' => 'TUVALU',
        'UCRANIA' => 'UCRANIA',
        'UGANDA' => 'UGANDA',
        'URUGUAY' => 'URUGUAY',
        'UZBEKISTÁN' => 'UZBEKISTÁN',
        'VANUATU' => 'VANUATU',
        'VENEZUELA' => 'VENEZUELA',
        'VIETNAM' => 'VIETNAM',
        'YEMEN' => 'YEMEN',
        'YIBUTI' => 'YIBUTI',
        'ZAMBIA' => 'ZAMBIA',
        'ZIMBABUE' => 'ZIMBABUE',
    ];
}
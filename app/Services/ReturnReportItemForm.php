<?php

namespace App\Services;

use App\Models\Dialing;
use App\Models\Disease;
use App\Models\Farm;
use App\Models\ReturnReportItemDisease;
use App\Models\Variety;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

final class ReturnReportItemForm
{
    public static function schema(): array
    {
        return [
            Grid::make()
            ->schema([
                Section::make()
                    ->schema([
                        Hidden::make('id'),
                        Forms\Components\Select::make('farm_id')
                            ->label('Finca')
                            ->columnSpan(3)
                            ->options(Farm::query()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('dialing_id')
                            ->label('Marcacion')
                            ->columnSpan(3)
                            ->options(Dialing::query()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('variety_id')
                            ->label('Variedad')
                            ->columnSpan(2)
                            ->options(Variety::query()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('hawb')
                            ->label('HAWB')
                            ->extraInputAttributes(['class' => 'fi-uppercase'])
                            ->required(),
                        Forms\Components\TextInput::make('packing')
                            ->label('Empaque')
                            ->required(),
                        Forms\Components\TextInput::make('piece')
                            ->label('Cantidad')
                            ->columnSpan(1)
                            ->numeric()
                            ->required(),
                        Forms\Components\Select::make('type_piece')
                            ->label('Tipo de Piezas')
                            ->options(self::$typePieces)
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('diseases')
                            ->label('Problemas')
                            ->columnSpan(3)
                            ->disabled()
                            ->preload()
                            ->multiple()
                            ->relationship('diseases', 'name'),
                        Forms\Components\TextInput::make('observations')
                            ->label('Observaciones')
                            ->columnSpan(3),
                        Section::make('')
                            ->schema([
                                Repeater::make('returnReportItemDisease')
                                    ->label('Detalle de Enfermedades')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\Select::make('disease_id')
                                            ->relationship('disease', 'name')
                                            ->columnSpan(3)
                                            ->disabled()
                                            ->label('Nombre Enfermedad'),
                                        Forms\Components\TextInput::make('percentage')
                                            ->label('Porcentaje')
                                            ->numeric()
                                            ->minValue(1)
                                            ->maxValue(100)
                                    ])->grid(2)
                                    ->columns(4)
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set){
                                        self::updatePercent($get, $set);
                                    })
                                    ->addable(false)
                                    ->deletable(false)
                                    
                                ]),
                            TextInput::make('qualification')
                                ->label('Calificacion Finca')
                                ->numeric()
                                ->readOnly()
                                ->prefix('%')
                                ->afterStateHydrated(function (Get $get, Set $set){
                                    self::updatePercent($get, $set);
                                })
                    ])->columns(6),
                    
                    Section::make()
                        ->schema([
                            FileUpload::make('images')
                                ->label('Imagenes')
                                ->multiple()
                                ->directory('reports_images/'. date('Y') .'-' . date('m'))
                                ->image()
                                ->imageEditor()
                                ->uploadProgressIndicatorPosition('center')
                                ->required()
                                ->reorderable()
                                ->optimize('webp')
                                ->resize(50)
                                ->imagePreviewHeight('100')
                        ])->columnSpan(4)
                
                ])->columns(4)
        ];
    }
    
    public static function updatePercent(Get $get, Set $set): void
    {
        // Selecciono todos los valores del Repeater
        $selectDisease = collect($get('returnReportItemDisease'));
        $totalPercent = $selectDisease->reduce(function ($totalPercent, $disease){
            // dd($totalPercent);
            return intval($totalPercent) + intval($disease['percentage']);
        }, 0);

        $set('qualification', $totalPercent);
    }

    protected static array $guideType = [
        'matitimo'  => 'Maritimo',
        'aereo'     => 'Aereo',
    ];

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

    protected static array $typePieces = [
        'eb' => 'EB',
        'qb' => 'QB',
        'hb' => 'HB',
    ];
}
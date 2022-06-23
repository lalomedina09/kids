<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    /**
     * Root categories
     *
     * @var  array
     */
    protected $root_categories = [
        [
            'name' => 'Main categories',
            'slug' => 'main-categories',
            'code' => 'main'
        ],
        [
            'name' => 'Course categories',
            'slug' => 'course-categories',
            'code' => 'courses'
        ]
    ];

    /**
     * Main categories
     *
     * @var  array
     */
    protected $main_categories = [
        'main' => [
            [
                'name' => 'Ahorro e inversión',
                'slug' => 'ahorro-e-inversion',
                'code' => 'savings-investments'
            ],
            [
                'name' => 'Estilo de vida',
                'slug' => 'estilo-de-vida',
                'code' => 'lifestyle'
            ],
            [
                'name' => 'Previsión',
                'slug' => 'prevision',
                'code' => 'forecast'
            ],
            [
                'name' => 'Tecnología',
                'slug' => 'tecnologia',
                'code' => 'technology'
            ],
            [
                'name' => 'Crédito y deudas',
                'slug' => 'credito-y-deudas',
                'code' => 'debts'
            ],
            [
                'name' => 'Emprendedores',
                'slug' => 'emprendedores',
                'code' => 'entrepreneurs'
            ]
        ],
        'courses' => [
            [
                'name' => 'Cursos presenciales',
                'slug' => 'cursos-presenciales',
                'code' => 'onsite'
            ],
            [
                'name' => 'Cursos online',
                'slug' => 'cursos-online',
                'code' => 'online'
            ],
            [
                'name' => 'Cursos para empresas',
                'slug' => 'cursos-para-empresas',
                'code' => 'companies'
            ]
        ]
    ];

    /**
     * Courses subcategories
     *
     * @var  array
     */
    protected $courses_subcategories = [
        'savings-investments' => [
            [
                'name' => 'Acciones',
                'slug' => 'acciones',
                'code' => 'share'
            ],
            [
                'name' => 'Fondos',
                'slug' => 'fondos',
                'code' => 'funds'
            ],
            [
                'name' => 'CETES',
                'slug' => 'cetes',
                'code' => 'cetes'
            ],
            [
                'name' => 'Divisas',
                'slug' => 'divisas',
                'code' => 'currencies'
            ],
            [
                'name' => 'Afore',
                'slug' => 'afore',
                'code' => 'afore'
            ],
            [
                'name' => 'Criptomonedas',
                'slug' => 'criptomonedas',
                'code' => 'criptocurrencies'
            ],
            [
                'name' => 'Inmobiliario',
                'slug' => 'inmobiliaria',
                'code' => 'realstate'
            ],
            [
                'name' => 'P2P',
                'slug' => 'p2p',
                'code' => 'p2p'
            ],
            [
                'name' => 'Seguro dotal',
                'slug' => 'seguro-dotal',
                'code' => 'endowment'
            ],
            [
                'name' => 'Tarjetas de débito',
                'slug' => 'tarjetas-de-debito',
                'code' => 'debitcards'
            ],
            [
                'name' => 'Impuestos',
                'slug' => 'impuestos',
                'code' => 'taxes'
            ],
            [
                'name' => 'Presupuesto',
                'slug' => 'presupuesto',
                'code' => 'budget'
            ],
            [
                'name' => 'Crowdfunding',
                'slug' => 'crowdfunding',
                'code' => 'crowdfunding'
            ],
            [
                'name' => 'Retiro',
                'slug' => 'retiro',
                'code' => 'retirement'
            ],
            [
                'name' => 'Ahorro',
                'slug' => 'ahorro',
                'code' => 'savings'
            ],
            [
                'name' => 'Metas',
                'slug' => 'metas',
                'code' => 'goals'
            ]
        ],
        'lifestyle' => [
            [
                'name' => 'Foodie',
                'slug' => 'foodie',
                'code' => 'foodie'
            ],
            [
                'name' => 'Viajes',
                'slug' => 'viajes',
                'code' => 'travels'
            ],
            [
                'name' => 'Temporada',
                'slug' => 'temporada',
                'code' => 'season'
            ],
            [
                'name' => 'Líderes',
                'slug' => 'lideres',
                'code' => 'leaders'
            ],
            [
                'name' => 'Pareja',
                'slug' => 'pareja',
                'code' => 'couples'
            ],
            [
                'name' => 'Niños',
                'slug' => 'ninos',
                'code' => 'kids'
            ],
            [
                'name' => 'Empleo',
                'slug' => 'empleo',
                'code' => 'job'
            ],
            [
                'name' => 'Automóvil',
                'slug' => 'automovil',
                'code' => 'car'
            ],
            [
                'name' => 'Cine',
                'slug' => 'cine',
                'code' => 'movies'
            ],
            [
                'name' => 'Educación',
                'slug' => 'educacion',
                'code' => 'education'
            ]
        ],
        'forecast' => [
            [
                'name' => 'Seguros',
                'slug' => 'seguros',
                'code' => 'insurance'
            ],
            [
                'name' => 'Testamento',
                'slug' => 'testamento',
                'code' => 'will'
            ]
        ],
        'technology' => [
            [
                'name' => 'Fintech',
                'slug' => 'fintech',
                'code' => 'fintech'
            ],
            [
                'name' => 'Apps',
                'slug' => 'apps',
                'code' => 'apps'
            ],
            [
                'name' => 'Gadgets',
                'slug' => 'gadgets',
                'code' => 'gadgets'
            ]
        ],
        'debts' => [
            [
                'name' => 'Tarjetas de crédito',
                'slug' => 'tarjetas-de-credito',
                'code' => 'creditcards'
            ],
            [
                'name' => 'Bancos',
                'slug' => 'bancos',
                'code' => 'banks'
            ],
            [
                'name' => 'Sofipos',
                'slug' => 'sofipos',
                'code' => 'sofipos'
            ]
        ],
        'entrepreneurs' => [
            [
                'name' => 'Emprendimiento',
                'slug' => 'emprendimientos',
                'code' => 'entrepreneurship'
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function createCategory($category) {
        $c = Category::where('name', $category['name'])->first();
        $c = ($c) ?: new Category;
        $c->name = $category['name'];
        $c->slug = $category['slug'];
        $c->code = $category['code'];

        if (!$c->save()) {
            Log::error('Unable to create element ', (array)$r->errors());
            return null;
        }

        return $c;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = $this->createCategory([
            'name' => 'Root categories',
            'slug' => 'root-categories',
            'code' => 'null'
        ]);

        foreach ($this->root_categories as $category) {
            if ($c = $this->createCategory($category)) {
                $c->appendToNode($root)->save();
            }
        }

        foreach ($this->main_categories as $code => $categories) {
            $parent = Category::where('code', $code)->first();
            foreach ($categories as $category) {
                if ($c = $this->createCategory($category)) {
                    $c->appendToNode($parent)->save();
                }
            }
        }

        foreach ($this->courses_subcategories as $code => $subcategories) {
            $parent = Category::where('code', $code)->first();
            foreach ($subcategories as $subcategory) {
                if ($c = $this->createCategory($subcategory)) {
                    $c->appendToNode($parent)->save();
                }
            }
        }
    }
}

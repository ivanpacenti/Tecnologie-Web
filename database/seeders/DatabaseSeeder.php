<?php

use App\Models\Offerta;
use App\Models\Pacchetto;
use App\Models\Azienda;
use App\Models\Emissione;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run() {
        /* generatore offerte fake*/
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
//            Offerta::create([
//                'descrizione' => $faker->sentence(),
//                'immagine' => $faker->imageUrl(),
//                'modalità' => $faker->name(),
//                'luogoFruizione' => $faker->address(),
//                'dataInizio' => $faker->date(),
//                'dataFine' => '2023-05-29',
//            ]);
            Pacchetto::create([
                'descrizione' => $faker->sentence(),
                'immagine' => $faker->imageUrl(),
                'modalità' => $faker->name(),
                'luogoFruizione' => $faker->address(),
            ]);
            /*Azienda::create([
                'partitaIva' => $faker->postcode(),
                'nome' => $faker->company(),
                'descrizione' => $faker->sentence(),
                'posizione' => $faker->streetAddress(),
                'tipologia' => $faker->companySuffix(),
                'logo' => $faker->imageUrl(),
            ]);*/
        }

//        for($i=0;$i<10;$i++)
//        {
//            Emissione::create([
//                'azienda'=>1,
//                'offerta'=>$i+1,
//            ]);
//        }

        /*
        DB::table('category')->insert([
            ['catId' => 1, 'name' => 'Computer', 'parId' => 0, 'desc' => 'Desktop, Laptop, Netbook'],
            ['catId' => 2, 'name' => 'Periferiche', 'parId' => 0, 'desc' => 'Hard Disk, Tastiere, Mouse'],
            ['catId' => 3, 'name' => 'Desktop', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Desktop'],
            ['catId' => 4, 'name' => 'Laptop', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Laptop'],
            ['catId' => 5, 'name' => 'NetBook', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Netbook'],
            ['catId' => 6, 'name' => 'HardDisk', 'parId' => 2, 'desc' => 'Descrizione dei Dischi Rigidi'],
        ]);

        DB::table('product')->insert([
            ['name' => 'NetBook Modello2', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook2', 'descLong' => self::DESCPROD,
                'price' => 219.34, 'discountPerc' => 12, 'discounted' => 0, 'image' => ''],
            ['name' => 'HardDisk Modello2', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk2', 'descLong' => self::DESCPROD,
                'price' => 86.37, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Italy.gif'],
            ['name' => 'Desktop Modello1', 'catId' => 3,
                'descShort' => 'Caratteristiche Desktop1', 'descLong' => self::DESCPROD,
                'price' => 1230.49, 'discountPerc' => 25, 'discounted' => 1, 'image' => 'Brazil.gif'],
            ['name' => 'Laptop Modello1', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 455.37, 'discountPerc' => 17, 'discounted' => 1, 'image' => ''],
            ['name' => 'Laptop Modello2', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 1889.67, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Argentina.gif'],
            ['name' => 'Netbook Modello3', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook3', 'descLong' => self::DESCPROD,
                'price' => 259.99, 'discountPerc' => 17, 'discounted' => 0, 'image' => 'Red Apple.gif'],
            ['name' => 'Laptop Modello3', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop3', 'descLong' => self::DESCPROD,
                'price' => 998.99, 'discountPerc' => 23, 'discounted' => 1, 'image' => 'UK.gif'],
            ['name' => 'HardDisk Modello1', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk1', 'descLong' => self::DESCPROD,
                'price' => 88.93, 'discountPerc' => 5, 'discounted' => 0, 'image' => 'USA.gif'],
            ['name' => 'HardDisk Modello4', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk4', 'descLong' => self::DESCPROD,
                'price' => 78.66, 'discountPerc' => 7, 'discounted' => 01, 'image' => 'Ukraine.gif']
        ]);

        DB::table('users')->insert([
            ['name' => 'Alex', 'surname' => 'Verdi', 'email' => 'alex@verdi.it', 'username' => 'alexalex',
                'password' => Hash::make('alexalex'), 'role' => 'user','created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Marco', 'surname' => 'Bianchi', 'email' => 'marco@bianchi.it', 'username' => 'useruser',
                'password' => Hash::make('useruser'), 'role' => 'user', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Mario', 'surname' => 'Rossi', 'email' => 'mario@rossi.it', 'username' => 'adminadmin',
                'password' => Hash::make('adminadmin'), 'role' => 'admin', 'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")]
        ]);
        DB::table('aziendas')->insert([
            ['partitaIva'=>'0101010101','posizione'=>'baraccola',
            'nome'=>'Aethra','descrizione'=>'Telecommunications',
            'tipologia'=>'Informatica','logo'=>'img/aethra.jpg'],
            ['partitaIva'=>'02020202','posizione'=>'baraccola',
            'nome'=>'Gimboldi','descrizione'=>'Telecommunications',
            'tipologia'=>'Panificio','logo'=>'img/gimbo.jpg'],
            ['partitaIva'=>'03030303','posizione'=>'senigallia',
            'nome'=>'Ipercoop','descrizione'=>'il Maestrale',
            'tipologia'=>'Cibo e tanta roba','logo'=>'img/iper.jpg']]
        );
        /* CI SONO ABILITATE LE OFFERTE FAKE
        DB::table('offertas')->insert([
            ['modalità'=>'online','immagine'=>'img/immagine_1.jpeg',
                'luogoFruizione'=>'Ancona','descrizione'=>'offerta generica1',
                'dataInizio'=>'2023-05-16','dataFine'=>'2023-12-16'],
            ['modalità'=>'online','immagine'=>'img/immagine_2.jpg',
                'luogoFruizione'=>'Ancona','descrizione'=>'offerta generica2',
                'dataInizio'=>'2023-05-16','dataFine'=>'2023-12-16'],
            ['modalità'=>'online','immagine'=>'img/immagine_3.jpg',
                'luogoFruizione'=>'Ancona','descrizione'=>'offerta generica3',
                'dataInizio'=>'2023-05-16','dataFine'=>'2023-12-16']]
        );*/

        DB::table('faqs')->insert([
                ['domanda'=>'Posso comperare un coupon senza registrarmi al sito?','risposta'=>'No, è necessario prima registrarsi al nostro sito,e poi accedere tramite il login'],
                ['domanda'=>'Posso comprare più volte lo stesso Coupon??','risposta'=>'No, è possibile comprare solamente una volta lo stesso coupon'],
                ['domanda'=>'Serve il kyc per prendere un coupon?','risposta'=>'No, servirà solo registrarsi al sito'],
                ['domanda'=>'Cosa devo far vedere al commerciante','risposta'=>'il foglio stampato']]
        );

        DB::table('users')->insert([
                ['name'=>'utente ','surname'=>'di prova','email'=>'emailutente@gmail.com','username'=>'useruser'
                    ,'password'=>Hash::make('z4Yt6alv'),'role' => 'user','età'=>30
                    ,'livelloAccesso'=>1,'genere'=>'femmina','telefono'=>'+39 02 1234567'],
                ['name'=>'staff ','surname'=>'DI PROVA','email'=>'emailstaff@gmail.com','username'=>'staffstaff'
                    ,'password'=>Hash::make('z4Yt6alv'),'role'=>'staff','età'=>20
                    ,'livelloAccesso'=>2,'genere'=>'maschio','telefono'=>'+391010109'],
                ['name'=>'admin','surname'=>'di prova','email'=>'emailadmin@gmail.com','username'=>'adminadmin'
                    ,'password'=>Hash::make('z4Yt6alv'),'role'=>'admin','età'=>90
                    ,'livelloAccesso'=>3,'genere'=>'femmina','telefono'=>'+39 2020201']]
        );

        DB::table('aziendas')->insert([
            ['partitaIva'=>'7593674937','nome'=>'Lacoste','posizione'=>'Piazza della Repubblica, 14, Ancona AN','descrizione'=>'Lacoste è un iconica marca di moda francese, nota per il suo stile sportivo ed elegante, caratterizzato dal coccodrillo verde ricamato, offrendo abbigliamento di alta qualità per uomini e donne.'
                ,'tipologia'=>'ONLINE','logo'=>'img/lacoste_logo.jpeg'],
            ['partitaIva'=>'11111111111','nome'=>'Louis Vuitton','posizione'=>'Galleria Vittorio Emanuele II, Milano MI','descrizione'=>'Louis Vuitton è un rinomato marchio di moda francese famoso per i suoi lussuosi prodotti di pelletteria e accessori.'
                ,'tipologia'=>'ONLINE','logo'=>'img/lv_logo.jpeg'],
            ['partitaIva'=>'15473823894','nome'=>'Yves Saint Laurent','posizione'=>'Via de Tornabuoni, 48, Firenze FI','descrizione'=>'Yves Saint Laurent è una rinomata casa di moda e profumi di lusso, conosciuta per il suo stile elegante e sofisticato.'
                ,'tipologia'=>'ONLINE','logo'=>'img/pngwing.com.png'],
            ['partitaIva'=>'09876543219','nome'=>'Adidas','posizione'=>'Località Santa Filomena nn, Chieti CH','descrizione'=>'Adidas è un rinomato marchio di abbigliamento sportivo di origine tedesca, noto per la sua vasta gamma di prodotti che comprendono scarpe, abbigliamento e accessori.'
                ,'tipologia'=>'ONLINE','logo'=>'img/Adidas_logo.png'],
            ['partitaIva'=>'56373829744','nome'=>'Nike','posizione'=>'Località Santa Filomena nn, Chieti CH','descrizione'=>'Nike è un celebre marchio di abbigliamento sportivo statunitense, specializzato in scarpe, abbigliamento e attrezzature sportive.'
                ,'tipologia'=>'ONLINE','logo'=>'img/Nike_logo.png'],
            ['partitaIva'=>'45276849302','nome'=>'Coop','posizione'=>'Via Carlo Maratta, 30, Ancona AN','descrizione'=>'Coop: Una catena di supermercati e ipermercati molto diffusa, offrendo una vasta gamma di prodotti alimentari, prodotti per la casa, articoli per la cura personale e altro ancora.'
                ,'tipologia'=>'ONLINE','logo'=>'img/Coop_logo.png'],
            ['partitaIva'=>'12345678901','nome'=>'Mediaworld','posizione'=>'Via 1º Maggio, 25 Freestand, Ancona AN','descrizione'=>'Mediaworld: Un rinomato rivenditore di elettronica e prodotti tecnologici, offrendo una vasta selezione di dispositivi, elettrodomestici, prodotti audio e video, computer, telefoni cellulari e accessori.'
                ,'tipologia'=>'ONLINE', 'logo'=>'img/Mediaworld_logo.png'],
            ['partitaIva'=>'34526627980','nome'=>'Med Store','posizione'=>'Corso Stamira, 45, Ancona AN','descrizione'=>'MedStore si rinnova, dopo 40 anni di esperienza nel mondo dell’elettronica di consumo, 15 anni nel mondo del retail e 10 nel mondo dell’eCommerce è giunto il tempo di intraprendere una nuova strada.'
                ,'tipologia'=>'ONLINE','logo'=>'img/MedStore_logo.png'],
        ]);
        DB::table('offertas')->insert([
            ['modalità'=>'20','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>' 20% di sconto su tutti i prodotti fino a un max di 100 euro di spesa
                ','dataInizio'=>'2023-05-11','dataFine' => '2023-09-29'],
            ['modalità'=>'30','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'30% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-04-29','dataFine' => '2023-07-29'],
            ['modalità'=>'40','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'40% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-23','dataFine' => '2023-05-29'],
            ['modalità'=>'10','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'10% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-11','dataFine' => '2023-05-29'],
            ['modalità'=>'60','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'60% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-10','dataFine' => '2023-06-29'],
            ['modalità'=>'10','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'10% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-3','dataFine' => '2023-05-29'],
            ['modalità'=>'20','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'20% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-14','dataFine' => '2023-05-30'],
            ['modalità'=>'5','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'5% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-18','dataFine' => '2023-08-29'],
            ['modalità'=>'40','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'40% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-20','dataFine' => '2023-05-21'],
            ['modalità'=>'15','immagine'=>'img/immagine_1.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'15% di sconto su tutti i prodotti fino a un max di 100 euro di spesa'
                ,'dataInizio'=>'2023-05-21','dataFine' => '2023-12-29']
        ]);

    }
}


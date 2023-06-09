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

        DB::table('faqs')->insert([
                ['domanda'=>'Posso comperare un coupon senza registrarmi al sito?','risposta'=>'No, è necessario prima registrarsi al nostro sito,e poi accedere tramite il login'],
                ['domanda'=>'Posso comprare più volte lo stesso Coupon??','risposta'=>'No, è possibile comprare solamente una volta lo stesso coupon'],
                ['domanda'=>'Serve il kyc per prendere un coupon?','risposta'=>'No, servirà solo registrarsi al sito'],
                ['domanda'=>'Cosa devo far vedere al commerciante','risposta'=>'La stampa del coupon']]
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
                ,'tipologia'=>'s.p.a','logo'=>'img/lacoste_logo.jpeg'],
            ['partitaIva'=>'11111111111','nome'=>'Louis Vuitton','posizione'=>'Galleria Vittorio Emanuele II, Milano MI','descrizione'=>'Louis Vuitton è un rinomato marchio di moda francese famoso per i suoi lussuosi prodotti di pelletteria e accessori.'
                ,'tipologia'=>'s.p.a','logo'=>'img/lv_logo.jpeg'],
            ['partitaIva'=>'15473823894','nome'=>'Yves Saint Laurent','posizione'=>'Via de Tornabuoni, 48, Firenze FI','descrizione'=>'Yves Saint Laurent è una rinomata casa di moda e profumi di lusso, conosciuta per il suo stile elegante e sofisticato.'
                ,'tipologia'=>'s.r.l','logo'=>'img/pngwing.com.png'],
            ['partitaIva'=>'09876543219','nome'=>'Adidas','posizione'=>'Località Santa Filomena nn, Chieti CH','descrizione'=>'Adidas è un rinomato marchio di abbigliamento sportivo di origine tedesca, noto per la sua vasta gamma di prodotti che comprendono scarpe, abbigliamento e accessori.'
                ,'tipologia'=>'s.r.l','logo'=>'img/Adidas_logo.png'],
            ['partitaIva'=>'56373829744','nome'=>'Nike','posizione'=>'Località Santa Filomena nn, Chieti CH','descrizione'=>'Nike è un celebre marchio di abbigliamento sportivo statunitense, specializzato in scarpe, abbigliamento e attrezzature sportive.'
                ,'tipologia'=>'s.r.l','logo'=>'img/Nike_logo.png'],
            ['partitaIva'=>'45276849302','nome'=>'Coop','posizione'=>'Via Carlo Maratta, 30, Ancona AN','descrizione'=>'Coop: Una catena di supermercati e ipermercati molto diffusa, offrendo una vasta gamma di prodotti alimentari, prodotti per la casa, articoli per la cura personale e altro ancora.'
                ,'tipologia'=>'s.p.a','logo'=>'img/Coop_logo.png'],
            ['partitaIva'=>'12345678901','nome'=>'Mediaworld','posizione'=>'Via 1º Maggio, 25 Freestand, Ancona AN','descrizione'=>'Mediaworld: Un rinomato rivenditore di elettronica e prodotti tecnologici, offrendo una vasta selezione di dispositivi, elettrodomestici, prodotti audio e video, computer, telefoni cellulari e accessori.'
                ,'tipologia'=>'s.p.a', 'logo'=>'img/mediaworld.png'],
            ['partitaIva'=>'34526627980','nome'=>'Med Store','posizione'=>'Corso Stamira, 45, Ancona AN','descrizione'=>'MedStore si rinnova, dopo 40 anni di esperienza nel mondo dell’elettronica di consumo, 15 anni nel mondo del retail e 10 nel mondo dell’eCommerce è giunto il tempo di intraprendere una nuova strada.'
                ,'tipologia'=>'s.a.s','logo'=>'img/MedStore_logo.png'],
        ]);
        DB::table('offertas')->insert([
            ['modalità'=>'20','immagine'=>'img/polo.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>' 20% di sconto su due polo a scelta'
                ,'dataInizio'=>'2023-05-11','dataFine' => '2023-09-29'],
            ['modalità'=>'30','immagine'=>'img/pantaloni.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'30% di sconto su tutti i pantaloni felpati'
                ,'dataInizio'=>'2023-04-29','dataFine' => '2023-07-29'],
            ['modalità'=>'40','immagine'=>'img/cintura.png','luogoFruizione'=>'ONLINE','descrizione'=>'40% di sconto su una cintura di pelle scelta dallo staff'
                ,'dataInizio'=>'2023-05-23','dataFine' => '2023-12-29'],
            ['modalità'=>'10','immagine'=>'img/profumo.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'10% di sconto su tutti i profumi'
                ,'dataInizio'=>'2023-05-11','dataFine' => '2023-12-29'],
            ['modalità'=>'60','immagine'=>'img/tuta.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'60% di sconto su tute e felpe a marchio Adidas'
                ,'dataInizio'=>'2023-05-10','dataFine' => '2023-06-29'],
            ['modalità'=>'10','immagine'=>'img/dunk.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'10% di sconto su Nike Dunk Low Panda'
                ,'dataInizio'=>'2023-05-3','dataFine' => '2023-12-29'],
            ['modalità'=>'20','immagine'=>'img/prodotti_coop.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'20% di sconto su tutti i marchi Coop'
                ,'dataInizio'=>'2023-05-14','dataFine' => '2023-12-30'],
            ['modalità'=>'5','immagine'=>'img/portatile.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'5% di sconto su tutti portatili'
                ,'dataInizio'=>'2023-05-18','dataFine' => '2023-08-29'],
            ['modalità'=>'40','immagine'=>'img/macbook.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'40% di sconto su tutti i MacBook Air'
                ,'dataInizio'=>'2023-05-20','dataFine' => '2023-12-21'],
            ['modalità'=>'15','immagine'=>'img/watch.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'15% di sconto su tutti i modelli di Apple Watch'
                ,'dataInizio'=>'2023-05-21','dataFine' => '2023-12-29'],
            ['modalità'=>'20','immagine'=>'img/dunk_ow.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'20% di sconto su Nike Dunk Low Off-White Lot 42',
                'dataInizio'=>'2023-05-11','dataFine' => '2023-09-29'],
            ['modalità'=>'30','immagine'=>'img/cappello.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'Proteggiti dal sole della calda estate con un cappello! per te subito il 30% di sconto!',
                'dataInizio'=>'2023-04-29','dataFine' => '2023-07-29'],
            ['modalità'=>'40','immagine'=>'img/scarpe_lc.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'40% di sconto su un paio di sneakers Lacoste',
                 'dataInizio'=>'2023-05-23','dataFine' => '2023-12-29'],
            ['modalità'=>'10','immagine'=>'img/borsa.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'10% di sconto su una borsa a scelta tra la collezione dei Classici YSL',
                 'dataInizio'=>'2023-05-11','dataFine' => '2023-12-29'],
            ['modalità'=>'60','immagine'=>'img/costume.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'Acquistando un costume da nuoto Adidas, avrai uno sconto del 60% sul costume!',
                'dataInizio'=>'2023-05-10','dataFine' => '2023-06-29'],
            ['modalità'=>'10','immagine'=>'img/dunk_diamond.jpg','luogoFruizione'=>'ONLINE','descrizione'=>'10% di sconto su Nike SB Dunk Low Diamond Supply Co Yellow',
                'dataInizio'=>'2023-05-03','dataFine' => '2023-12-29'],
            ['modalità'=>'20','immagine'=>'img/pizza.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'sconto del 20% su tutte le pizze!! ',
                'dataInizio'=>'2023-05-14','dataFine' => '2023-12-30'],
            ['modalità'=>'5','immagine'=>'img/vivobook.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'5% di sconto su tutti gli Asus VivoBook 14',
                'dataInizio'=>'2023-05-18','dataFine' => '2023-08-29'],
            ['modalità'=>'40','immagine'=>'img/ipad.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'40% di sconto su tutti gli iPad ricondizionati',
                'dataInizio'=>'2023-05-20','dataFine' => '2023-12-21'],
            ['modalità'=>'15','immagine'=>'img/ultra.jpeg','luogoFruizione'=>'ONLINE','descrizione'=>'15% di sconto su tutti i modelli di Apple Watch Ultra, il compagno perfetto per monitorare la tua attività',
                'dataInizio'=>'2023-05-21','dataFine' => '2023-12-29'],
        ]);
        DB::table('assegnaziones')->insert([
            ['utente'=>'staffstaff','azienda'=>'2']
            ]);
        DB::table('emissiones')->insert([
            ['azienda' => '1', 'offerta'=>'1'],
            ['azienda' => '1', 'offerta'=>'2'],
            ['azienda' => '2', 'offerta'=>'3'],
            ['azienda' => '3', 'offerta'=>'4'],
            ['azienda' => '4', 'offerta'=>'5'],
            ['azienda' => '5', 'offerta'=>'6'],
            ['azienda' => '6', 'offerta'=>'7'],
            ['azienda' => '7', 'offerta'=>'8'],
            ['azienda' => '8', 'offerta'=>'9'],
            ['azienda' => '8', 'offerta'=>'10'],
            ['azienda' => '5', 'offerta'=>'11'],
            ['azienda' => '4', 'offerta'=>'12'],
            ['azienda' => '1', 'offerta'=>'13'],
            ['azienda' => '3', 'offerta'=>'14'],
            ['azienda' => '4', 'offerta'=>'15'],
            ['azienda' => '5', 'offerta'=>'16'],
            ['azienda' => '6', 'offerta'=>'17'],
            ['azienda' => '7', 'offerta'=>'18'],
            ['azienda' => '8', 'offerta'=>'19'],
            ['azienda' => '8', 'offerta'=>'20']
        ]);

    }
}


<?php

use App\Models\Modal;
use Illuminate\Database\Seeder;

class ModalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $lineLabels = ["601-Aerolândia","661-Aerolândia/SP2","951-Aeroporto/Arena Castelão","917-Aeroporto/Beira Mar","404-Aeroporto/Benfica/Rodoviária","950-Aeroporto/Zona Hoteleira","013-Aguanambi I","014-Aguanambi II","681-Alameda das Palmeiras","973-Alberto Craveiro/Arena Castelão/PCL","804-Aldeota","730-Alojamento 01/Dragão do Mar","735-Alojamento 01/UFC","731-Alojamento 02/Dragão do Mar","742-Alojamento 03/Dragão do Mar.","743-Alojamento 03/UFC","736-Alojamento 04/UFC","737-Alojamento 05/Cine São Luiz","732-Alojamento 05/Dragão do Mar","733-Alojamento 06/Dragão do Mar","739-Alojamento 06/Praça dos Leões","744-Alojamento 06/UFC","734-Alojamento 07/Dragão do Mar","740-Alojamento 07/Praça dos Leões","741-Alojamento 07/UFC","632-Alto Alegre/Messejana","112-Álvaro Weyne/Centro","216-Antônio Bezerra","088-Antônio Bezerra/Albert Sabin","122-Antônio Bezerra/Álvaro Weyne","962-Antônio Bezerra/Arena Castelão","777-Antônio Bezerra/Aterro/Abolição","930-Antônio Bezerra/Aterro/PFilgueiras","942-Antônio Bezerra/Barra do Ceará","250-Antônio Bezerra/Centro","200-Antônio Bezerra/Centro/BRT","251-Antônio Bezerra/Coração de Jesus","791-Antônio Bezerra/Domingos Olímpio","042-Antônio Bezerra/Francisco Sá/Papicu","986-Antônio Bezerra/Halleluya/Castelão","024-Antônio Bezerra/Lagoa/Unifor","026-Antônio Bezerra/Messejana","082-Antônio Bezerra/Messejana/Perimetral","071-Antônio Bezerra/Mucuripe","945-Antônio Bezerra/Mucuripe/Papicu","079-Antônio Bezerra/Náutico","943-Antônio Bezerra/North Shopping","028-Antônio Bezerra/Papicu","222-Antônio Bezerra/Papicu/Antônio Sales","092-Antônio Bezerra/Papicu/Praia de Iracema","072-Antônio Bezerra/Parangaba","244-Antônio Bezerra/Parangaba/Montese","979-Antônio Bezerra/Parque da Paz","991-Antônio Bezerra/Paulo Sarasate","918-Antônio Bezerra/Riomar Kennedy","097-Antônio Bezerra/Siqueira","074-Antônio Bezerra/Unifor","374-Aracapé/Centro","372-Aracapé/Parangaba I","375-Aracapé/Parangaba II","325-Aracapé/Siqueira","466-Arvoredo/Parangaba","928-Aterro/Arena Castelão","215-Autran Nunes","702-Av. Antônio Sales/Dionísio Torres","031-Av. Borges de Melo I","032-Av. Borges de Melo II","350-Av. José Bastos/Lagoa","318-Av. Lineu Machado/SP1","348-Av. Lineu Machado/SP2","220-Av. Sargento Hermínio","503-Av. Treze de Maio/Rodoviária I","504-Av. Treze de Maio/Rodoviária II","501-Bairro de Fátima","706-Barra do Ceará/Antônio Bezerra","711-Barra do Ceará/Cais do Porto","643-Barroso Circular","613-Barroso/Jardim Viôleta","101-Beira Rio","790-Bela Vista/Domingos Olímpio","305-Bela Vista/Humberto Monte","304-Bela Vista/Lagoa","365-Bela Vista/Viriato Ribeiro","201-Bezerra de Menezes/Bairro Ellery","086-Bezerra de Menezes/Santos Dumont","855-Bezerra de Menezes/Washington Soares","914-Binário Circular","966-BNB/Arena Castelão/PCL","984-Bolsão Leste","976-Bolsão Oeste","335-Bom Jardim I","366-Bom Jardim II","333-Bom Jardim/Centro","752-Caça e Pesca/Centro","049-Caça e Pesca/Centro/Beira Mar","968-Caça e Pesca/Iguatemi","779-Caça e Pesca/Serviluz/Aterro/Abolição","782-Caça e Pesca/Serviluz/Aterro/PFilgueiras","906-Caça e Pesca/Serviluz/Centro","960-Cambeba/Arena Castelão","020-Campus do Pici","075-Campus do Pici/Unifor","310-Campus Universitários/Pan Americano","338-Canindezinho","705-Canindezinho/UECE","631-Carlos Albuquerque","311-Castelão/Parangaba","328-Castelão/Parangaba/SP2","778-Castelo Encantado/Aterro/Abolição","781-Castelo Encantado/Aterro/PFilgueiras","907-Castelo Encantado/Centro","972-CEU/Arena Castelão","833-Cidade 2000/Centro","753-Cidade 2000/Sargento Hermínio","610-Cidade Func/Cj Alvorada","611-Cidade Func/Cofeco/Lago Jacarey","825-Cidade Func/Papicu/Jardim das Oliveiras","609-Cidade Func/Sítio São José","649-Cidade Func/Sítio São José/CMR","399-Cidade Jardim/Parangaba","648-Cidade Nobre/Messejana","317-Cidade Nova/Parangaba","738-Cine São Luiz/Dragão do Mar","011-Circular I","786-Circular I/Abolição/IE","784-Circular I/Dom Luiz/IE","012-Circular II","787-Circular II/Abolição/IE","785-Circular II/Dom Luiz/IE","640-Cj Alvorada/Messejana","755-Cj Alvorada/North Shopping","324-Cj Ceará/1ª Etapa","327-Cj Ceará/4ª Etapa","076-Cj Ceará/Aldeota","015-Cj Ceará/Antônio Bezerra I","081-Cj Ceará/Antônio Bezerra II","776-Cj Ceará/Aterro/Abolição","936-Cj Ceará/Aterro/PFilgueiras","096-Cj Ceará/Barão de Studart","367-Cj Ceará/Bom Jardim/SP1","368-Cj Ceará/Bom Jardim/SP2","710-Cj Ceará/Bonsucesso/Centro","709-Cj Ceará/Centro","343-Cj Ceará/Centro/2ª Etapa","341-Cj Ceará/Centro/3ª Etapa","797-Cj Ceará/Domingos Olímpio","357-Cj Ceará/Granja Lisboa","985-Cj Ceará/Halleluya/Castelão","083-Cj Ceará/Lagoa/Augusto dos Anjos","043-Cj Ceará/Lagoa/Fernandes Távora","948-Cj Ceará/North Shopping","045-Cj Ceará/Papicu/Montese","982-Cj Ceará/Parque da Paz","997-Cj Ceará/Paulo Sarasate","345-Cj Ceará/Siqueira","676-Cj Curió","331-Cj Esperança/Centro","379-Cj Esperança/Parangaba","330-Cj Esperança/Siqueira","340-Cj Itaperi","645-Cj João Paulo II","637-Cj Maria Tomásia/Santa Filomena","114-Cj Nova Assunção/Francisco Sá","354-Cj Novo Lar/Siqueira","940-Cj Palmeiras/Abreulândia","660-Cj Palmeiras/Centro","759-Cj Palmeiras/Centro/STPC","712-Cj Palmeiras/Papicu","636-Cj Palmeiras/Parque Santa Maria","629-Cj Palmeiras/Perimetral","686-Cj São Bernardo","646-Cj São Cristóvão","309-Cj Sumaré/Parangaba","635-Cj Tamandaré","612-Cj Tancredo Neves/Novo Lagamar","388-Cj Tatumundé","339-Cj Veneza Tropical/Mirasol I","349-Cj Veneza Tropical/Mirasol II","064-Corujão/Aeroporto/Centro/Rodoviária","039-Corujão/Av. Bezerra de Menezes","034-Corujão/Av. Paranjana I","035-Corujão/Av. Paranjana II","059-Corujão/Av. Sargento Hermínio","065-Corujão/Barroso/Jardim Viôleta","063-Corujão/Bom Jardim","033-Corujão/Circular I","046-Corujão/Cj Ceará","037-Corujão/Cj Ceará/Aldeota","036-Corujão/Cj Ceará/Papicu/Montese","062-Corujão/Cj Esperança","023-Corujão/Edson Queiróz/Papicu","055-Corujão/Grande Circular I","056-Corujão/Grande Circular II","058-Corujão/Jardim Guanabara/N Assunção II","057-Corujão/Jardim Iracema","047-Corujão/José Bastos/Centro","398-Corujão/José Bastos/Genibaú","095-Corujão/José Walter","665-Corujão/Messejana/Centro","090-Corujão/Montese","048-Corujão/Parangaba/Papicu","615-Corujão/Paupina/Lagoa Redonda","620-Corujão/Pedras","054-Corujão/Praia do Futuro/Caça e Pesca","016-Cuca Barra/Papicu","070-Cuca Barra/Parangaba","696-Curió/Messejana","835-Defensoria/Papicu/Via Câmara","308-Demócrito Rocha","604-Dias Macedo/Centro","312-Dias Macedo/Parangaba","901-Dom Luíz","205-Dom Lustosa","816-Edson Queiróz/Centro","806-Edson Queiróz/Papicu","826-Edson Queiróz/Papicu/ED","922-Especial/Reserva Antônio Bezerra","927-Especial/Reserva Cj Ceará","924-Especial/Reserva Lagoa","921-Especial/Reserva Messejana","925-Especial/Reserva Papicu","923-Especial/Reserva Parangaba","926-Especial/Reserva Siqueira","214-Estação/Pio Saraiva I","217-Estação/Pio Saraiva II","226-Expresso/Antônio Bezerra/Messejana","098-Expresso/Antônio Bezerra/Papicu","091-Expresso/Antônio Bezerra/Parangaba","286-Expresso/Antônio Bezerra/Santos Dumont","093-Expresso/Messejana/Papicu","094-Expresso/Parangaba/Aldeota","089-Expresso/Parangaba/Papicu","087-Expresso/Siqueira/Papicu","106-Floresta/Centro","080-Francisco Sá/Parangaba","316-Genibaú/Centro","356-Genibaú/Lagoa","663-Gereberaba/Messejana","051-Grande Circular I","052-Grande Circular II","754-Granja Lisboa/Goiabeiras","322-Granja Portugal/Lagoa","641-Guajerú I","642-Guajerú II","314-Henrique Jorge","841-HGF/Papicu/Riomar","303-Igreja São Raimundo","017-Inter Shoppings","630-Itamaraty/Elizabeth II","307-Itaóca/Jardim América","666-Jardim Castelão","022-Jardim das Oliveiras/Centro","346-Jardim Fluminense","115-Jardim Guanabara/Centro","212-Jardim Guanabara/Cj Nova Assunção I","213-Jardim Guanabara/Cj Nova Assunção II","111-Jardim Iracema","387-Jardim Jatobá/Centro","337-Jardim Jatobá/Siqueira I","397-Jardim Jatobá/Siqueira II","603-Jardim União/Centro","321-Jardim União/Parangaba","967-JK/Arena Castelão/PCL","320-João  XXIII/Centro","225-João Arruda","323-João XXIII/Lagoa","351-Jóquei/Bonsucesso","605-José Walter/Br 116/Av. I","606-José Walter/Br 116/Av. N","728-José Walter/Centro","407-José Walter/Expedicionários","680-José Walter/Papicu/Cidade Jardim","377-José Walter/Parangaba/Av. J","347-José Walter/Parangaba/Av. L","389-Jovita Feitosa/Shopping Benfica","616-Lagoa Redonda I","626-Lagoa Redonda II","617-Lagoa Redonda/Abreulândia/Direita","634-Lagoa Redonda/Abreulândia/Esquerda","644-Lagoa Redonda/Abreulândia/Litorânea","627-Lagoa Redonda/Papicu","067-Lagoa/Albert Sabin","085-Lagoa/Aldeota","773-Lagoa/Aterro/Abolição","933-Lagoa/Aterro/PFilgueiras","934-Lagoa/Caça e Pesca","796-Lagoa/Domingos Olímpio","998-Lagoa/FGF","983-Lagoa/Halleluya/Castelão","069-Lagoa/Papicu/Via Expressa","996-Lagoa/Paulo Sarasate","364-Lagoa/Riomar Kennedy/José Jataí","061-Linha Central/Via Centro Fashion","021-Luciano Cavalcante/Papicu","780-Meireles/Aterro/Abolição","783-Meireles/Aterro/PFilgueiras","905-Meireles/Centro","772-Messejana/Aterro/Abolição","935-Messejana/Aterro/PFilgueiras","650-Messejana/Centro/Br Nova/Expresso","793-Messejana/Domingos Olímpio","600-Messejana/Frei Cirilo/Expresso","988-Messejana/Halleluya/Castelão","068-Messejana/Papicu/Cambeba/LJ","004-Messejana/Papicu/Cambeba/TJ","815-Messejana/Papicu/Cj Tancredo Neves","019-Messejana/Papicu/Manibura","053-Messejana/Papicu/Washington Soares","315-Messejana/Parangaba","993-Messejana/Paulo Sarasate","685-Messejana/Rodoviária","656-Messejana/Sabiaguaba/Direita","657-Messejana/Sabiaguaba/Esquerda","393-Miguel Arraes/Siqueira","334-Monte Rey/Siqueira","411-Montese/Lagoa","421-Montese/Lagoa/Parangaba/ED","401-Montese/Parangaba","392-Nova Esperança/Siqueira","233-Olavo Bilac/Bairro Ellery","025-Opaia/Lagoa","206-Padre Andrade/Antônio Bezerra","964-Papicu/Arena Castelão","771-Papicu/Aterro/Abolição","937-Papicu/Aterro/PFilgueiras","920-Papicu/Caça e Pesca","814-Papicu/Castelo Encantado","832-Papicu/Cidade 2000","820-Papicu/Cj Alvorada","794-Papicu/Domingos Olímpio","840-Papicu/Fortal","987-Papicu/Halleluya/Castelão","831-Papicu/Hospital Geral/Cidade 2000/ED","770-Papicu/Iguatemi","944-Papicu/Parque do Cocó","994-Papicu/Paulo Sarasate","810-Papicu/Praia do Futuro","813-Papicu/Praia do Futuro II/ED","913-Papicu/Serviluz/Varjota","313-Parangaba/Alto da Paz","774-Parangaba/Aterro/Abolição","931-Parangaba/Aterro/PFilgueiras","932-Parangaba/Caça e Pesca","403-Parangaba/Centro/Expedicionários","792-Parangaba/Domingos Olímpio","413-Parangaba/Expedicionários","947-Parangaba/Halleluya/Castelão","946-Parangaba/Igreja de Fátima","390-Parangaba/João Pessoa","371-Parangaba/José Bastos","040-Parangaba/Lagoa","077-Parangaba/Mucuripe","029-Parangaba/Náutico","941-Parangaba/North Shopping","041-Parangaba/Oliveira Paiva/Papicu","038-Parangaba/Papicu","066-Parangaba/Papicu/Aeroporto","044-Parangaba/Papicu/Montese","353-Parangaba/Parque Veras","992-Parangaba/Paulo Sarasate","919-Parangaba/Santuário da Assunção","513-Parangaba/UECE/Luciano Carneiro","701-Parque Americano","405-Parque Dois Irmãos/Expedicionários","382-Parque Jerusalém","625-Parque Manibura/Borges de Melo","602-Parque Pio XII/Ana Gonçalves","369-Parque Presidente Vargas","336-Parque Santa Cecília I","376-Parque Santa Cecília II","725-Parque Santa Maria/Liceu","690-Parque Santa Maria/Messejana","381-Parque Santa Maria/Siqueira","618-Parque Santa Rosa/Messejana","329-Parque Santa Rosa/Siqueira","384-Parque Santana","383-Parque São João/Siqueira","319-Parque São José/Osório de Paiva","342-Parque São Vicente","243-Parque Universitários/Antônio Bezerra","394-Parque Universitários/Lagoa","396-Parque Universitários/Lagoa II","060-Parquelândia/Parangaba","633-Passaré/Centro","655-Passaré/Messejana","391-Passaré/Parangaba","619-Paupina","703-Paupina/Pici","621-Pedras I","622-Pedras II","406-Planalto Ayrton Senna/Expedicionários","456-Planalto Ayrton Senna/Parangaba","639-Planalto Coaçu/Messejana","386-Planalto Granja Lisboa","909-Praia do Futuro/Caça Pesca/Beira Mar","969-Praia do Futuro/Iguatemi","210-Quintino Cunha/Antônio Bezerra","240-Quintino Cunha/Centro","260-Quintino Cunha/Riomar Kennedy","788-Riomar/Aterro","202-Rodolfo Teófilo/Bezerra de Menezes","302-Rodolfo Teófilo/José Bastos","653-Santa Fé","108-Santa Maria/Bairro Ellery","359-Santa Tereza","713-Santos Dumont/Perimetral","974-SEUMA/Arena Castelão/PCL","971-Shopping Jóquei/Arena Castelão","961-Shopping Parangaba/Arena Castelão","963-Siqueira/Arena Castelão","775-Siqueira/Aterro/Abolição","938-Siqueira/Aterro/PFilgueiras","939-Siqueira/Caça e Pesca","965-Siqueira/Cemitério Bom Jardim II","300-Siqueira/Centro/Expresso","795-Siqueira/Domingos Olímpio","989-Siqueira/Halleluya/Castelão","360-Siqueira/João Pessoa","355-Siqueira/José Bastos","332-Siqueira/Lagoa","084-Siqueira/Messejana/Perimetral","099-Siqueira/Mucuripe/Barão de Studart","078-Siqueira/Mucuripe/ED","361-Siqueira/Osório de Paiva/Parangaba","030-Siqueira/Papicu/13 de Maio","027-Siqueira/Papicu/Aeroporto","050-Siqueira/Papicu/Washington Soares","975-Siqueira/Parque da Saudade","995-Siqueira/Paulo Sarasate","073-Siqueira/Praia de Iracema","929-Siqueira/UECE","362-Siqueira/Vila Manoel Sátiro/Parangaba","395-Sítio Córrego/Parangaba","949-Sítio São João/Abreulândia","670-Sítio São João/Centro","628-Sítio São João/Parque Santa Maria","953-UNIFOR/Arena Castelão","378-Urucutuba/Siqueira","903-Varjota","954-Via Sul/Arena Castelão","344-Vila Betânia/Parangaba","110-Vila do Mar/Centro","140-Vila do Mar/Centro II/ES","120-Vila do Mar/Náutico/Antônio Bezerra I","130-Vila do Mar/Náutico/Antônio Bezerra II/SFS","363-Vila Manoel Sátiro/Centro","102-Vila Santo Antônio/Nossa Senhora Graças","132-Vila Santo Antônio/Riomar Kennedy","502-Vila União","211-Vila Velha/Antônio Bezerra","757-Vila Velha/Centro","767-Vila Velha/North Shopping/Riomar Kennedy","221-Vila Velha/Riomar Kennedy","952-Zona Hoteleira/Arena Castelão"];

        $modal = Modal::create([
            'label' => 'Ônibus',
            'icon' => 'bus'
        ]);

        $modalProblems = [
            'Atraso',
            'Segurança',
            'Atendimento',
        ];

        foreach ($modalProblems as $modalProblem) {
            \App\Models\ModalProblem::create([
                'modal_id' => $modal->id,
                'label' => $modalProblem,
            ]);
        }

        foreach ($lineLabels as $lineLabel) {
            \App\Models\ModalLine::create([
                'modal_id' => $modal->id,
                'label' => $lineLabel,
            ]);
        }

        $lineLabels = [
            "Capital Radio Taxi",
            "Coopertaxi",
            "Cooperttur",
            "Taxi Fortaleza",
            "Fone Taxi Fortaleza",
            "Radio Taxi Cidade",
            "Fonte Taxi Messajana",
            "Radio Taxi Executivo",
            "Desquetaxi Fortaleza"
        ];

        $modal = Modal::create([
            'label' => 'Taxi',
            'icon' => 'car'
        ]);

        $modalProblems = [
            'Atraso',
            'Segurança',
            'Atendimento',
        ];

        foreach ($modalProblems as $modalProblem) {
            \App\Models\ModalProblem::create([
                'modal_id' => $modal->id,
                'label' => $modalProblem,
            ]);
        }

        foreach ($lineLabels as $lineLabel) {
            \App\Models\ModalLine::create([
                'modal_id' => $modal->id,
                'label' => $lineLabel
            ]);
        }

        $lineLabels = [
            "Uber",
            "99 Taxi",
            "99 Pop",
            "Cabify",
        ];

        $modal = Modal::create([
            'label' => 'App',
            'icon' => 'car'
        ]);

        $modalProblems = [
            'Atraso',
            'Segurança',
            'Atendimento',
        ];

        foreach ($modalProblems as $modalProblem) {
            \App\Models\ModalProblem::create([
                'modal_id' => $modal->id,
                'label' => $modalProblem,
            ]);
        }

        foreach ($lineLabels as $lineLabel) {
            \App\Models\ModalLine::create([
                'modal_id' => $modal->id,
                'label' => $lineLabel
            ]);
        }
    }
}

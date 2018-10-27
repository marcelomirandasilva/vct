<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('telefone1',11)                  ->nullable();
            $table->string('telefone2',11)                  ->nullable();
            $table->string('telefone3',11)                  ->nullable();
            $table->string('email')                         ->nullable();
            $table->date('nascimento')                     ->nullable();

            $table->string('pais',100)                      ->nullable();
            
            
            $table->string('cpf',15)                  ->nullable();
 
            $table->enum('uf',['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO'])   ->nullable();

            $table->string('municipio',30)                  ->nullable();
            $table->string('bairro',20)                     ->nullable();
            $table->string('logradouro',100)                ->nullable();
            $table->string('numero',20)                     ->nullable();
            $table->string('complemento',100)               ->nullable();
            $table->char('cep',10)                          ->nullable();

            $table->enum('uf',['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO'])   ->nullable();

            $table->string('municipio_entrega',30)                  ->nullable();
            $table->string('bairro_entrega',20)                     ->nullable();
            $table->string('logradouro_entrega',100)                ->nullable();
            $table->string('numero_entrega',20)                     ->nullable();
            $table->string('complemento_entrega',100)               ->nullable();
            $table->char('cep_entrega',10)                          ->nullable();
            $table->string('contato_entrega',100)                   ->nullable();
            

            $table->string('conta',20)                      ->nullable();
            $table->string('agencia',10)                    ->nullable();

            $table->enum('banco',[
                'A.J.RENNER S.A.-654',
                'ABC BRASIL S.A.-246',
                'ALFA S.A.-25',
                'ALVORADA S.A.-641',
                'ARBI S.A.-213',
                'AZTECA DO BRASIL S.A.-19',
                'BANERJ S.A.-29',
                'BANESTES S.A. DO ESTADO DO ESPÍRITO SANTO-21',
                'BANIF-INTERNACIONAL DO FUNCHAL (BRASIL)S.A.-719',
                'BANK OF AMERICA MERRILL LYNCH MÚLTIPLO S.A.-755',
                'BANKBOSTON N.A.-744',
                'BANKPAR S.A.-0',
                'BARCLAYS S.A.-740',
                'BB POPULAR DO BRASIL S.A.-73',
                'BBM S.A.-107',
                'BEG S.A.-31',
                'BES INVESTIMENTO DO BRASIL S.A.-DE INVESTIMENTO-78',
                'BGN S.A.-739',
                'BM&F DE SERVIÇOS DE LIQUIDAÇÃO E CUSTÓDIA S.A-96',
                'BMG S.A.-318',
                'BNP PARIBAS BRASIL S.A.-752',
                'BOAVISTA INTERATLÂNTICO S.A.-248',
                'BONSUCESSO S.A.-218',
                'BPN BRASIL MÚLTIPLO S.A.-69',
                'BRACCE S.A.-65',
                'BRADESCO BBI S.A.-36',
                'BRADESCO CARTÕES S.A.-204',
                'BRADESCO FINANCIAMENTOS S.A.-394',
                'BRADESCO S.A.-237',
                'BRASCAN S.A.-225',
                'BRB - DE BRASÍLIA S.A.-70',
                'BRICKELL S.A. CRÉDITO FINANCIAMENTO E INVESTIMENTO-092-2',
                'BRJ S.A.-M15',
                'BTG PACTUAL S.A.-208',
                'BVA S.A.-44',
                'CACIQUE S.A.-263',
                'CAIXA ECONÔMICA FEDERAL-104',
                'CAIXA GERAL - BRASIL S.A.-473',
                'CAPITAL S.A.-412',
                'CARGILL S.A.-40',
                'CÉDULA S.A.-266',
                'CITIBANK N.A.-477',
                'CITIBANK S.A.-745',
                'CITICARD S.A.-M08',
                'CLÁSSICO S.A.-241',
                'CNH CAPITAL S.A.-M19',
                'COMERCIAL E DE INVESTIMENTO SUDAMERIS S.A.-215',
                'CONCÓRDIA S.A.-081-7',
                'COOPERATIVA CENTRAL DE CRÉDITO NOROESTE BRASILEIRO LTDA.-097-3',
                'COOPERATIVA CENTRAL DE CRÉDITO URBANO-CECRED-085-x',
                'COOPERATIVA CENTRAL DE ECONOMIA E CRÉDITO MUTUO DAS UNICREDS-090-2',
                'COOPERATIVA CENTRAL DE ECONOMIA E CREDITO MUTUO DAS UNICREDS-099-x',
                'COOPERATIVA DE CRÉDITO RURAL DA REGIÃO DE MOGIANA-089-2',
                'COOPERATIVA UNICRED CENTRAL SANTA CATARINA-087-6',
                'COOPERATIVO DO BRASIL S.A. - BANCOOB-756',
                'COOPERATIVO SICREDI S.A.-748',
                'CR2 S.A.-75',
                'CREDIBEL S.A.-721',
                'CREDICOROL COOPERATIVA DE CRÉDITO RURAL-098-1',
                'CREDIT AGRICOLE BRASIL S.A.-222',
                'CREDIT SUISSE (BRASIL) S.A.-505',
                'CRUZEIRO DO SUL S.A.-229',
                'DA AMAZÔNIA S.A.-3',
                'DA CHINA BRASIL S.A.-083-3',
                'DAIMLERCHRYSLER S.A.-M21',
                'DAYCOVAL S.A.-707',
                'DE LA NACION ARGENTINA-300',
                'DE LA PROVINCIA DE BUENOS AIRES-495',
                'DE LA REPUBLICA ORIENTAL DEL URUGUAY-494',
                'DE LAGE LANDEN BRASIL S.A.-M06',
                'DE PERNAMBUCO S.A. - BANDEPE-24',
                'DE TOKYO-MITSUBISHI UFJ BRASIL S.A.-456',
                'DEUTSCHE BANK S.A. - ALEMÃO-487',
                'DIBENS S.A.-214',
                'DO BRASIL S.A.-1',
                'DO ESTADO DE SERGIPE S.A.-47',
                'DO ESTADO DO PARÁ S.A.-37',
                'DO ESTADO DO PIAUÍ S.A. - BEP-39',
                'DO ESTADO DO RIO GRANDE DO SUL S.A.-41',
                'DO NORDESTE DO BRASIL S.A.-4',
                'DRESDNER BANK BRASIL S.A. - MÚLTIPLO-751',
                'FATOR S.A.-265',
                'FIAT S.A.-M03',
                'FIBRA S.A.-224',
                'FICSA S.A.-626',
                'FORD S.A.-M18',
                'GE CAPITAL S.A.-233',
                'GERDAU S.A.-734',
                'GMAC S.A.-M07',
                'GOLDMAN SACHS DO BRASIL MÚLTIPLO S.A.-64',
                'GUANABARA S.A.-612',
                'HIPERCARD MÚLTIPLO S.A.-62',
                'HONDA S.A.-M22',
                'HSBC BANK BRASIL S.A. - MÚLTIPLO-399',
                'HSBC FINANCE (BRASIL) S.A. - MÚLTIPLO-168',
                'IBI S.A. MÚLTIPLO-63',
                'IBM S.A.-M11',
                'INDUSTRIAL DO BRASIL S.A.-604',
                'INDUSTRIAL E COMERCIAL S.A.-320',
                'INDUSVAL S.A.-653',
                'ING BANK N.V.-492',
                'INTERCAP S.A.-630',
                'INTERMEDIUM S.A.-077-9',
                'INVESTCRED UNIS.A.-249',
                'ITAÚ BBA S.A.-184',
                'ITAÚ UNIHOLDING S.A.-652',
                'ITAÚ UNIS.A.-341',
                'ITAÚBANK S.A-479',
                'ITAUCRED FINANCIAMENTOS S.A.-M09',
                'J. P. MORGAN S.A.-376',
                'J. SAFRA S.A.-74',
                'JBS S.A.-79',
                'JOHN DEERE S.A.-217',
                'JPMORGAN CHASE BANK-488',
                'KDB S.A.-76',
                'KEB DO BRASIL S.A.-757',
                'LUSO BRASILEIRO S.A.-600',
                'MATONE S.A.-212',
                'MÁXIMA S.A.-243',
                'MAXINVEST S.A.-M12',
                'MERCANTIL DO BRASIL S.A.-389',
                'MODAL S.A.-746',
                'MONEO S.A.-M10',
                'MORADA S.A.-738',
                'MORGAN STANLEY S.A.-66',
                'NATIXIS BRASIL S.A. MÚLTIPLO-14',
                'NBC BANK BRASIL S.A. - MÚLTIPLO-753',
                'OBOE CRÉDITO FINANCIAMENTO E INVESTIMENTO S.A.-086-8',
                'OPPORTUNITY S.A.-45',
                'OURINVEST S.A.-M17',
                'PANAMERICANO S.A.-623',
                'PARANÁ S.A.-254',
                'PAULISTA S.A.-611',
                'PECÚNIA S.A.-613',
                'PETRA S.A.-094-2',
                'PINE S.A.-643',
                'PORTO SEGURO S.A.-724',
                'POTTENCIAL S.A.-735',
                'PROSPER S.A.-638',
                'PSA FINANCE BRASIL S.A.-M24',
                'RABOBANK INTERNATIONAL BRASIL S.A.-747',
                'RANDON S.A.-088-4',
                'REAL S.A.-356',
                'RENDIMENTO S.A.-633',
                'RIBEIRÃO PRETO S.A.-741',
                'RODOBENS S.A.-M16',
                'RURAL MAIS S.A.-72',
                'RURAL S.A.-453',
                'SAFRA S.A.-422',
                'SANTANDER (BRASIL) S.A.-33',
                'SCHAHIN S.A.-250',
                'SEMEAR S.A.-743',
                'SIMPLES S.A.-749',
                'SOCIÉTÉ GÉNÉRALE BRASIL S.A.-366',
                'SOFISA S.A.-637',
                'STANDARD DE INVESTIMENTOS S.A.-12',
                'SUMITOMO MITSUI BRASILEIRO S.A.-464',
                'TOPÁZIO S.A.-082-5',
                'TOYOTA DO BRASIL S.A.-M20',
                'TRIÂNGULO S.A.-634',
                'TRICURY S.A.-M13',
                'UNI- UNIÃO DE BANCOS BRASILEIROS S.A.-409',
                'UNICARD MÚLTIPLO S.A.-230',
                'UNICRED CENTRAL DO RIO GRANDE DO SUL-091-4',
                'UNICRED NORTE DO PARANÁ-84',
                'VOLKSWAGEN S.A.-M14',
                'VOLVO (BRASIL) S.A.-M23',
                'VOTORANTIM S.A.-655',
                'VR S.A.-610',
                'WESTLB DO BRASIL S.A.-370'
                
            ])   ->nullable();



            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}

<?php

if (! function_exists('pegaValorEnum')) {
   function pegaValorEnum($table, $column) {
      $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
         preg_match('/^enum\((.*)\)$/', $type, $matches);
         $enum = array();
         foreach( explode(',', $matches[1]) as $value )
         {
            $v = trim( $value, "'" );
            $enum[] = $v;
         } 
         
      return $enum;
   }
}

if (! function_exists('retiraMascaraCPF')) {
   function retiraMascaraCPF($cpf) {
      $cpf = trim($cpf);
      $cpf = str_replace(".", "", $cpf);
      $cpf = str_replace("-", "", $cpf);
      return $cpf;
   }
}

if (! function_exists('retiraMascaraTelefone')) {
   function retiraMascaraTelefone($telefone) {
      $telefone = trim($telefone);
      $telefone = str_replace("(", "", $telefone);
      $telefone = str_replace(")", "", $telefone);
      $telefone = str_replace("-", "", $telefone);
      $telefone = str_replace(" ", "", $telefone);
      return $telefone;
   }
}


if (! function_exists('formataPlaca')) {
   function formataPlaca($placa){
      $tam	= strlen($placa);
      $primeiraParte = substr($placa,0,3);
      $segundaParte = substr($placa,3);
      
      $PLACA = $primeiraParte ."-". $segundaParte;
      return $PLACA;
   }
}

if (! function_exists('formataTelefone')) {
   function formataTelefone($TEL){
      $tam = strlen(preg_replace("/[^0-9]/", "", $TEL));
      if ($tam == 13) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
         return "+".substr($TEL,0,$tam-11)."(".substr($TEL,$tam-11,2).")".substr($TEL,$tam-9,5)."-".substr($TEL,-4);
      }
      if ($tam == 12) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
         return "+".substr($TEL,0,$tam-10)."(".substr($TEL,$tam-10,2).")".substr($TEL,$tam-8,4)."-".substr($TEL,-4);
      }
      if ($tam == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
         return "(".substr($TEL,0,2).")".substr($TEL,2,5)."-".substr($TEL,7,11);
      }
      if ($tam == 10) { // COM CÓDIGO DE ÁREA NACIONAL
         return "(".substr($TEL,0,2).")".substr($TEL,2,4)."-".substr($TEL,6,10);
      }
      
      if ($tam <= 9) { // SEM CÓDIGO DE ÁREA
         return substr($TEL,0,$tam-4)."-".substr($TEL,-4);
      }
   }
}


if (! function_exists('formataCPF_CNPJ')) {
   function formataCPF_CNPJ($cnpj_cpf)
   {
   if (strlen(preg_replace("/\D/", '', $cnpj_cpf)) === 11) {
      $response = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
   } else {
      $response = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
   }

   return $response;
   }
}
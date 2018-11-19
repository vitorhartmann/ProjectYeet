<?php
  include ("../conexao.php");
  //Define o gmt (timezone) que o servidor deve se basear para horários e datas. Isso pode ser feito diretamente dentro no php.ini.
  date_default_timezone_set("America/Sao_Paulo");
?>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>

  //Aqui iniciamos os arrays codProdutoAntigo e nomeProdutoAntigo, 
  //que receberão depois o último valor (ou seja, o valor antes da mudança) de cada campo de código e nome no formulário
  codProdutoAntigo = new Array();
  nomeProdutoAntigo = new Array();
  //Agora eles só recebem o valor da primeira linha, que por enquanto é o mesmo do campo vazio ("")
  codProdutoAntigo[0] = "";
  nomeProdutoAntigo[0] = "";
  
    /*função criada para receber os valores dos campos existentes, usados posteriormente para descobrirmos se o valor do campo foi alterado ou não*/
  function valoresAntigos (){
    //recebe todas as posições do campo selproduto[] e salva na variável codProduto
    var codProduto = document.getElementsByName('selproduto[]');
    //repete para o nome do produto
	var nomeProduto = document.getElementsByName('nomeProduto[]');
    //da posição 0 até a posição final do array...
    for (var i=0;i<codProduto.length;i++){
      //...captura e salva o valor atual do campo selproduto no array criado no carregamento da página para os valores antigos
      codProdutoAntigo[i] = codProduto[i].value;
      nomeProdutoAntigo[i] = nomeProduto[i].value;
    }
	
  }

  //função que mostra os dados a serem carregados pelo BD na linha CORRETA
  function busca(pesquisarPor){
    //recebe todas as posições do campo selproduto[] e salva na variável codMudar
    var codMudar = document.getElementsByName('selproduto[]');
	//alert(codMudar);
    //recebe todas as posições do campo nomeProduto[] e salva na variável nomeMudar
    var nomeMudar = document.getElementsByName('nomeProduto[]');
	var valorMudar = document.getElementsByName('valorun[]');

    //cria a variável que irá receber a posição do campo modificado
	var atual=-1;
	//verifica da posição 0 até a posição final do array...
    for (var j=0;j<codMudar.length;j++){
      //...se o valor antigo do nome ou do código for diferente do valor atual...
      if ((nomeProdutoAntigo[j] != nomeMudar[j].value || codProdutoAntigo[j] != codMudar[j].value) && (nomeMudar[j].value!=codMudar[j].value)){
        //é porque essa foi a posição alterada, portanto repassa a posição atual para a variável 'atual'
        atual=j;
      }
    }
	//se o parâmetro recebido tiver o valor "codigo"
	if (pesquisarPor=="codigo"){
		//grava o valor digitado no campo de código em valorcampo
		valorcampo = codMudar[atual].value;
		
	//senão se o valor for "nome"	
	}else{
		//grava o valor digitado no campo de nome em valorcampo
		valorcampo = nomeMudar[atual].value;
	}
	
    //inicia um processo que envia o código por post para a página buscadinamica.php, que pesquisa dinamicamente pelo código quais os produtos correspondentes àquela categoria e...
	$.post("buscaProduto.php", {tipo:pesquisarPor, valor:valorcampo},    //inicia uma função que recebe os produtos encontrados na pesquisa da página buscadinamica.php em busca, e...
		function(busca){
			var dados = jQuery.parseJSON(busca);
			valorMudar[atual].value=dados.valor;
			//se o parâmetro recebido tiver o valor "codigo"
			if (pesquisarPor=="codigo"){
				//coloca o valor encontrado no BD no campo nome correto
				nomeMudar[atual].value=dados.dado;
				
			//senão se o valor for "nome"	
			}else{
				//coloca o valor encontrado no BD no campo codigo correto
				codMudar[atual].value=dados.dado;

			}
			
		calculaProduto();	
		//chama a função valoresAntigos para guardar os valores atuais das categorias como antigos
		valoresAntigos();
		//fecha o processo do post
		});
  //fecha a função busca
  }
  /*
 function busca(){
		  
		  
		
		if (empty(nomeProduto)){
			pesquisarpor = ("codigo");
			// valorcampo = valor do campo codigo
			var campo = document.getElementById('nomeProduto[]');
			valorcampo = nomeProduto[].value
		}else{
		
			pesquisarpor = ("nome");
			// valorcampo = valor do campo nome
			var campo = document.getElementById('selproduto[]');
			valorcampo = selproduto[].value
		}

		// alerta de aguarde		
		
		$.post("buscaProduto.php", {tipo:pesquisarpor, valorcampo:campo},
      //caso o código contido em buscacidades.php seja executado corretamente, executa uma função que tem como parâmetro a variável "busca", que por sua vez contém o que foi gerado da página buscacidades.php
      function(busca){
        campo.value = busca;
      });
			
		 
		  
	  }*/
</script>

<script>
function calculaProduto() {
  
  
      //recebe os valores dos produtos preenchidos
      var produtosUn = document.getElementsByName('valorun[]');
      //recebe os valores das quantidades preenchidas
      var qtde = document.getElementsByName('txtqtde[]');
      //recebe os valores das quantidades preenchidas
      var result = document.getElementsByName('totalProduto[]');
      //conta quantos elementos foram capturados
	  var qtdeElementos = produtosUn.length;
      //estrutura para-faça para repetir a validação enquanto i for menor que o tamanho do array
      for (var i = 0;i < qtdeElementos; i++){
        //se a posição atual dos arrays de produto e quantidade estiverem vazios,
        //if ((produtosValidar[i].value=="")||(qtdeValidar[i].value=="")){
			
        var resultValidar =  parseFloat(produtosUn[i].value) *  parseFloat(qtde[i].value);
			if (isNaN(resultValidar)){;// Função IsNan
		result[i].value = 0;
		
      }else{
		  
		  
		  	result[i].value = parseFloat(resultValidar.toFixed(2));
	  
	  }
    calculaTotal();
}

	  }
</script>

<script>
function calculaTotal(){
      var resultado = document.getElementsByName('totalProduto[]');
      //conta quantos elementos foram capturados
	  var qtdeElementos = resultado.length;
    // Magica estruturada 2
    var totalfinal = document.getElementById('totalfinal');

    var resultadoTotal = 0;
	var arredondar =0;
      //estrutura para-faça para repetir a validação enquanto i for menor que o tamanho do array
      for (var i = 0;i < qtdeElementos; i++){
      
	  
			arredondar = arredondar + parseFloat(resultado[i].value);
     // resultadoTotal =  resultadoTotal +  parseFloat(resultado[i].value);
		resultadoTotal = parseFloat(arredondar.toFixed(2));
		  	
	
  
}
        totalfinal.value = resultadoTotal;
	  }
	  

	 
</script>


<script  src="jquery.js"></script>
    <script type="text/javascript">
    //Abaixo o código Javascript com jQuery que permite remover e adicionar Detalhes do formulário.
    //indica que apenas quando o documento estiver pronto (ready) execute as seguintes linhas dentro do bloco.
    $(function() {

    	//cria a função removeDetalhe
      function removeDetalhe() {
        
        //desvincula a ação de clique na class "removerDetalhe" (botão de X) que vem junto com o clone, para que posteriomente seja vinculada uma função de "click" que referencie a linha correta do elemento.
        $(".removerDetalhe").off("click");
      
        //ao se clicar no elemento com a class "removerDetalhe", inicia uma função em que...
        $(".removerDetalhe").on("click", function() {
          
          
          //... se a quantidade de tags tr com a classe detalhes for maior que 1, ou seja, se houver mais de uma linha no mestre-detalhe (isso serve para evitar que se exclua todas as linhas)
          if($("tr.detalhes").length > 1){
            //remove a linha que contém o botão de excluir que foi clicado
            //explicando: this seria o botão (pois o clique nele causou a execução dessa função), o primeiro parent é a célula onde está o botão e o segundo parent é a linha onde está o botão, assim o remove age na linha
            $(this).parent().parent().remove();
            calculaTotal();
          //senão
          }else{
            calculaTotal();
            //avisa que não se pode excluir a última linha
            alert("A última linha não pode ser removida.");
           
          }
          //termina a function do on
          }
        );
      //termina a função removeDetalhe
      }

      //Ao clicar no botão adicionarDetalhe, inicia a seguinte função:
      $(".adicionarDetalhe").click(function () {
        //Cria um clone da primeira linha de detalhe e salva na variável novoDetalhe
        novoDetalhe = $("tr.detalhes:first").clone();
        //Esvazia os valores de todos os inputs do clone (já o select aparece vazio por ser carregado do banco novamente ao se criar a linha)
        novoDetalhe.find("input").val("");
        //Insere o clone na página, logo após a última linha já existente (LAST)
        novoDetalhe.insertAfter("tr.detalhes:last");
        //Executa a função removeDetalhe para que o detalhe inserido possa ser excluido com o clique no botão de menos dessa linha
        //(PS: essa ação aqui é obrigatória, mas você pode também executar essa função acima de sua própria criação (linha 17) para que, caso a pessoa tente excluir a única linha logo ao carregar a página, apareça o alert da linha 32)
        removeDetalhe();
      //fecha a função da linha 41
      });
    //finaliza as funções de adicionar/remover detalhe
    });


    //função de validação simples dos Detalhes do mestre detalhe, onde se mostra a primeira linha vazia caso haja alguma
    function validaDetalhe(){
      //recebe os valores dos produtos preenchidos
      var produtosValidar = document.getElementsByName('selproduto[]');
      //recebe os valores das quantidades preenchidas
      var qtdeValidar = document.getElementsByName('txtqtde[]');
	  
	  
	  var produtosValor = document.getElementsByName('valorun[]');
	  
	  var produtosNome = document.getElementsByName('nomeProduto[]');
	  
	  var produtosTotal = document.getElementsByName('totalProduto[]');
	  
      //conta quantos elementos foram capturados
      var qtdeElementos = produtosValidar.length;
      //estrutura para-faça para repetir a validação enquanto i for menor que o tamanho do array
      for (var i = 0;i < qtdeElementos; i++){
        //se a posição atual dos arrays de produto e quantidade estiverem vazios,
        if ((produtosValidar[i].value=="")||(qtdeValidar[i].value=="")){
          //cria a variável linha com valor de "i mais um" para a mensagem avisar corretamente qual Detalhe não foi preenchido, já que o array começa da posição 0
          var linha = i+1;
          alert ("A linha "+linha+" não foi completamente preenchida.");
          //foca o campo de produto da linha que não está devidamente preenchida
          produtosValidar[i].focus();
    
          return false;
        }
      }
    }
    </script>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">
		


	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Tela de Vendas</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="../../index.html"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>
		    <form name="frm_venda" method="post" action="inseredados.php" onsubmit="return validaDetalhe()">
      <table border="1" bgcolor="#A9A9A9" align="center">
	  <tr>
	  <td colspan="6"><?php 
	  
		 $sql  = mysqli_query($conn, "select id_venda from venda");
		
	   while($resultado = mysqli_fetch_array($sql)){ 
			echo '<label>'.$resultado["id_categoria"].'</label>';
	   }?></td>
	  </tr>
        <tr>
        
        
        
          <td align="right">Data: </td>
          <td colspan="3">
            <input type="text" name="txtdata" readonly value="<?php echo date("d/m/Y"); ?>">
          </td>
        
        
          <td align="right">Hora: </td>
          <td colspan="3">
            <input type="text" name="txthora" readonly value="<?php echo date("H:i:s"); ?>">
          </td>
        </tr>
		<tr height="30px"></tr>
        <tr>
          <td class="titulo_produtos" colspan="8">Produto(s)</td>
        </tr>
	
        <tr>
		  <td>Cód Barras</td>
          <td>Produto</td>
          <td>Valor Un</td>
		  <td>Quantidade</td>
		  <td>Valor Total</td>
		  
          <td>
            <!--botão com função de adicionar uma nova linha de produto, ou seja, um novo "detalhe", a cada clique-->
            <a href="#" class="adicionarDetalhe" title="Adicionar item"><img src="../../img/botaoadicionar.png" border="0" width="35px" height="35px"></a>
          </td>
        </tr>
        <!--Linha do detalhe, identificada pela classe "detalhes"-->
        <tr class="detalhes">
          <td>
            
            
              <!-- Por que array("[]")? Porque haverão vários "detalhes", ou seja, vários selects de produtos.
              Sendo assim, todos os campos de um detalhe deve ter seus nomes como array-->
             
             
			 <input type="text" id="selproduto[]" name="selproduto[]" onblur="busca('codigo')" size="15"></input>
            
            
          </td>
          <td>
		 
            <input type="text" id="nomeProduto[]" name="nomeProduto[]" onblur="busca('nome')" size="25">
          </td>
		  <td>
            <input type="text" id="valorun[]"  name="valorun[]"  size="3" readonly>
			
          </td> 
		  <td>
		  <input type="text" name="txtqtde[]" id="textqtde[]" size="3"  onblur="calculaProduto()">
		  </td>
          <td>
		  <input type="text" id="totalProduto[]" name="totalProduto[]" readonly size="4">
		  </td>
		  
		  
		  <td>
		  
            <!--botão com função de remover essa linha de produto, ou seja, esse "detalhe", ao clicar-->
            <a href="#" class="removerDetalhe" title="Remover linha"><img src="../../img/excluirbotao.png" border="0" width="35px" height="35px"></a>
          </td>
        </tr>
        <tr>
          <td align="right" colspan="6">
		  <button type="reset">Limpar Campos</button>
            <button type="submit">Cadastrar</button>
			</td>
			</tr>
			<td colspan="4"></td>
			<td colspan="2">
			<label>SubTotal:</label>
			
			
			<input type="text" id="totalfinal" name="totalfinal"></input>
      
          </td>
        </tr>
      </table>
    </form>
	
	
  </body>
	
</html>
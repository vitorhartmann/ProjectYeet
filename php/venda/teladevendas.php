<?php
  include ("../conexao.php");
  //Define o gmt (timezone) que o servidor deve se basear para horários e datas. Isso pode ser feito diretamente dentro no php.ini.
  date_default_timezone_set("America/Sao_Paulo");
?>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
			
        var resultValidar =  parseInt(produtosUn[i].value) *  parseInt(qtde[i].value);
			if (isNaN(resultValidar)){;// Função IsNan
		result[i].value = 0;
		
      }else{
		  	result[i].value = resultValidar;
	  
	  }
  
}

	  }
</script>

<script>
function calculaTotal(){
      var resultado = document.getElementsByName('totalProduto[]');
      //conta quantos elementos foram capturados
	  var qtdeElementos = resultado.length;
      //estrutura para-faça para repetir a validação enquanto i for menor que o tamanho do array
      for (var i = 0;i < qtdeElementos; i++){
      
			
        var resultadoTotal =  parseInt(resultadoTotal.value) +  parseInt(resultado[i].value);

		  	totalfinal = resultadoTotal.value;
	
  
}

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
          //senão
          }else{
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
              <input type="text" name="selproduto[]" size="15"></input>
            
            
          </td>
          <td>
            <input type="text" id="nomeproduto[]" name="nomeProduto[]" size="25">
          </td>
		  <td>
            <input type="text" id="valorun[]" name="valorun[]" disabled size="3">
          </td> 
		  <td>
		  <input type="text" name="txtqtde[]" id="textqtde[]" size="3"  onblur="calculaProduto()">
		  </td>
          <td>
		  <input type="text" id="totalProduto[]" name="totalProduto[]" disabled size="4">
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
			<label>TOTAL:</label>
			
			
			<input type="text" id="totalfinal" name="totalfinal" onblur="calculaTotal()"></input>
      
          </td>
        </tr>
      </table>
    </form>
	
	
  </body>
	
</html>
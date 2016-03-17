<?php
/**
 * @file salario.php
 * @brief CALCULADORA DE IMPOSTOS SOB SALARIO
 * @date 26/02/2016
 * @version 1.0
 * @author LETICIA BRUNA 
 */
	require_once "funcoes.php";
 
	if($_POST){
		$dblSalario = formataMoeda($_POST['txtSalario']);
		$arrParametrosINSS = verificaFaixaINSS($dblSalario);
		
		
		$dblINSS = $dblSalario * ($arrParametrosINSS['aliquota'] / 100);
		$dblNewSalario = $dblSalario - $dblINSS;
		$arrParametrosIR = verificaFaixaIR($dblNewSalario);
		$dblIR = $dblNewSalario * ($arrParametrosIR['aliquota'] / 100);
		$dblIR = $dblIR - $arrParametrosIR['deducao'];
		$dblNewSalario = $dblNewSalario - $dblIR;
		
		
	}
	
	
?>



<html>
  <body>
    <script src="jquery-1.6.2.min.js"></script>
    <script src="maskmoney.js"></script>
    <form action='' method='post' name='frmListagem' id='frmListagem'>
      <center>
        <div style = 'width: 800px; min-height: 600px; background-color: #F2F2F2; border: 1px solid #F4F4F4;'>
          <center><h1 style = "color: #636363;">C&aacute;culo de Sal&aacute;rio</h1></center>
          <hr style = 'width: 770px;'>
          <div style = 'width: 800px; min-height: 600px; background-color: #F2F2F2; border: 1px solid #F4F4F4;'>
            <table style = 'width: 70%;'>
              <tr>
                <td style = 'color: #636363; font-size: 24;'><b>Sal&aacute;rio</b></td>
                <td> &nbsp;<input type = "text" id = "txtSalario" value = '<?php echo number_format($dblSalario, 2, ",", ""); ?>' name = "txtSalario" style = "border-radius: 5px 5px 5px 5px; height: 30px;" /></td>
              </tr>
              <tr> 
                <td colspan = 2>
                  <center><input type = "submit" id = "btnSubmit" name = "btnSubmit"></center>
                </td>
              </tr>
            </table>
						<hr style = 'width: 770px;'>
						<?php 
						if($_POST){
							?>
							<center><h1 style = "color: #636363;">Resultado</h1></center>
								<center>
								<table style = 'width: 60%;  border: 1px solid #ddd; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 14px bold;line-height: 1.42857143;color: #333;'>
							
									<thead  style = 'borderfont-weight: bold;display: table-header-group; vertical-align: middle; '>
										<td style = 'padding: 8px;'>Evento</td>
										<td style = 'padding: 8px;'>Ref.</td>
										<td style = 'padding: 8px;'>Proventos</td>
										<td style = 'padding: 8px;'>Descontos</td>
									</thead>
									<tbody>
										<tr>
											<td style = 'padding: 8px; font-weight: bold;'>Sal&aacute;rio Bruto</td>
											<td style = 'padding: 8px;'> - </td>
											<td style = 'padding: 8px;'> <?php echo number_format($dblSalario, 2, ",", ""); ?> </td>
											<td style = 'padding: 8px;'> - </td>
										</tr>
										<tr>
											<td style = 'padding: 8px; font-weight: bold;'>INSS</td>
											<td style = 'padding: 8px;'> <?php echo ($arrParametrosINSS['faixa'] == "D"? "TETO" : (number_format($arrParametrosINSS['aliquota'], 2, ",", ""))." %") ?> </td>
											<td style = 'padding: 8px;'> - </td>
											<td style = 'padding: 8px;'> <?php echo number_format($dblINSS, 2, ",", ""); ?></td>
										</tr>
										<tr>
											<td style = 'padding: 8px; font-weight: bold;'>IRRF</td>
											<td style = 'padding: 8px;'> <?php echo  number_format($arrParametrosIR['aliquota'], 2, ",", "") . " %";?></td>
											<td style = 'padding: 8px;'> - </td>
											<td style = 'padding: 8px;'> <?php echo  number_format($dblIR, 2, ",", "");?> </td>
										</tr>
										<tr>
											<td style = 'padding: 8px; font-weight: bold;' colspan = 2>Totais</td>
											<td style = 'padding: 8px;'> R$ <?php echo  number_format($dblSalario, 2, ",", "");?> </td>
											<td style = 'padding: 8px;'> R$ <?php echo  number_format(($dblINSS + $dblIR), 2, ",", "");?> </td>
										</tr>
										<tr>
											<td style = 'padding: 8px;  font-weight: bold;' colspan = 2>Sal&aacute;rio L&iacute;quido</td>
											<td style = 'padding: 8px;' colspan = 2><center> R$ <?php echo  number_format($dblNewSalario, 2, ",", "");?> </center></td>
											
										</tr>
									</tbody>
								</table>
							</center>
							<?php
						}
						?>
          </div>
        </div>
      </center>
    </form>
    <script>
      $(document).ready(function(){
        $("#txtSalario").maskMoney({symbol:'R$ ', 
            showSymbol:true, 
            thousands:'.', 
            decimal:',', 
            symbolStay: true
          });

        });
    </script>
  </body>
</html>
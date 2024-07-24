<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Anamnese Nutricional</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <script defer src="js/calculos_dobras.js"></script>
    <script language="javascript">      
        function mascara(src, mask) {
            var i = src.value.length;
            var saida = mask.substring(1,2);
            var texto = mask.substring(i);
            if (texto.substring(0,1) != saida) {
                src.value += texto.substring(0,1);
            } 
        }

        function selecionarMetodo() {
            var metodo = document.getElementById('metodo').value;
            if (metodo === 'Dobras Cutâneas') {
                document.getElementById('medidas-dobras').style.display = 'block';
                document.getElementById('medidas-circunferencias').style.display = 'none';
            } 
            calcularCalorias(); // Chama a função de cálculo ao selecionar o método
        }

        function calcularCalorias() {
            var metodo = document.getElementById('metodo').value;
            if (metodo === 'Dobras Cutâneas') {
                calcularCaloriasDobras();
            }
        }

        function gerarCardapio() {
        // Captura os dados do formulário
        var formData = new FormData(document.querySelector('form'));
            
        fetch('gerar_cardapio.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('cardapio-result').innerHTML = data.cardapio;
        })
        .catch(error => console.error('Erro:', error));
        }

    </script>
</head>
<body>
<div class="sidebar">
    <ul>
        <li><a href="inicio.html">Pacientes</a></li>
        <li><a href="inicio.html">Sair</a></li>
    </ul>
</div>
<div class="container">
    <h2>Ficha de Anamnese Nutricional dobras</h2>
    <form action="recebe_cadastro.php" method="post">
    <!-- DIV de Dadoss Pessoais -->
    <div class="section">
        <h3>Dados Pessoais</h3>
        <div class="form-row">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Nome completo">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="seu@email.com">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(99) 99999-9999" maxlength="14" onKeyPress="mascara(this, '(##)#####-####')">
            </div>
        </div>
            
        <div class="form-row">
            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" id="idade" name="idade" onchange="calcularCaloriasDobras()">
            </div>

            <div class="form-group">
                <label for="genero">Gênero</label>
                <select id="genero" name="genero" onchange="calcularCalorias()">
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </div>
        </div>
    </div>

    <!-- DIV de Calcular Calorias -->
    <div class="section">
        <label for="metodo">Método de Cálculo:</label>
        <select id="metodo" name="metodo" onchange="selecionarMetodo()">
            <option value="">Selecione</option>
            <option value="Dobras Cutâneas">Dobras Cutâneas</option>
        </select>
    </div>
    <div id="medidas-dobras" style="display: none;">
    <h3>Medidas de Dobras Cutâneas</h3>
<div class="form-row">
    <div class="form-group">
        <label for="triceps">Tríceps (mm)</label>
        <input type="text" id="triceps" name="triceps" onchange="calcularPercentualGordura()">
    </div>
    <div class="form-group">
        <label for="subescapular">Subescapular (mm)</label>
        <input type="text" id="subescapular" name="subescapular" onchange="calcularPercentualGordura()">
    </div>
    <div class="form-group">
        <label for="axilar-media">Axilar Média (mm)</label>
        <input type="text" id="axilar-media" name="axilar-media" onchange="calcularPercentualGordura()">
    </div>
    <div class="form-group">
        <label for="peitoral">Peitoral (mm)</label>
        <input type="text" id="peitoral" name="peitoral" onchange="calcularPercentualGordura()">
    </div>
    <div class="form-group">
        <label for="imc">IMC</label>
        <input type="text" id="imc" name="imc" readonly>
        <p id="resultado"></p>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <label for="suprailiaca">Supra-ilíaca (mm)</label>
        <input type="text" id="suprailiaca" name="suprailiaca" onchange="calcularPercentualGordura()">
    </div>
    <div class="form-group">
        <label for="abdominal">Abdominal (mm)</label>
        <input type="text" id="abdominal" name="abdominal" onchange="calcularPercentualGordura()">
    </div>
    <div class="form-group">
        <label for="coxa">Coxa (mm)</label>
        <input type="text" id="coxa" name="coxa" onchange="calcularPercentualGordura()">
    </div>
    <div class="form-group">
        <label for="percentualGordura">Percentual de Gordura</label>
        <input type="text" id="percentualGordura" name="percentualGordura" readonly>
    </div>
</div>

    </div>
    <div class="section">
        <div class="form-row">
            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number" id="peso" name="peso" oninput="calcularCalorias()">
            </div>
            <div class="form-group">
                <label for="altura">Altura (cm):</label>
                <input type="number" id="altura" name="altura" oninput="calcularCalorias()">
            </div>
            
            <div class="form-group">
                <label for="nivel-atividade">Nível de Atividade:</label>
                <select id="nivel-atividade" name="nivel-atividade" onchange="calcularCalorias()">
                    <option value="">Selecione</option>
                    <option value="sedentario">Sedentário</option>
                    <option value="atividade-leve">Atividade Leve</option>
                    <option value="atividade-moderada">Atividade Moderada</option>
                    <option value="atividade-intensa">Atividade Intensa</option>
                    <option value="atividade-muito-intensa">Atividade Muito Intensa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="objetivo">Objetivo:</label>
                <select id="objetivo" name="objetivo" onchange="calcularCalorias()">
                    <option value="">Selecione</option>
                    <option value="emagrecer">Emagrecer</option>
                    <option value="manter-peso">Manter Peso</option>
                    <option value="ganhos-secos">Ganhos Secos</option>
                    <option value="ganhos-agressivos">Ganhos Agressivos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estado">Estado Atual</label>
                <select id="estado" name="estado" onchange="calcularCalorias()">
                    <option value="">Selecione</option>
                    <option value="magro">Magro</option>
                    <option value="consideravel">Massa magra considerável e BF não muito alto</option>
                    <option value="falso-magro">Falso Magro</option>
                    <option value="acima-peso">Muito acima do peso</option>
                </select>
            </div>
        </div>
    </div>
    <div class="section">
        <h3>Resultados</h3>
        <div class="form-row">
            <div class="form-group">
                <label for="tmb">Taxa Metabólica Basal (TMB):</label>
                <input type="text" id="tmb" name="tmb" readonly>
            </div>
            <div class="form-group">
                <label for="tdee">Gasto Energético Diário (TDEE):</label>
                <input type="text" id="tdee" name="tdee" readonly>
            </div>
            <div class="form-group">
                <label for="consumo">Consumo Diário de Calorias:</label>
                <input type="text" id="consumo" name="consumo" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="proteina">Proteína (g)</label>
                <input type="text" id="proteina" name="proteina" readonly>
            </div>

            <div class="form-group">
                <label for="gordura">Gordura (g)</label>
                <input type="text" id="gordura" name="gordura" readonly>
            </div>

            <div class="form-group">
                <label for="carboidratos">Carboidratos (g)</label>
                <input type="text" id="carboidratos" name="carboidratos" readonly>
            </div>
        </div>
    </div>

    <!-- DIV de Histórico Saúde -->
    <div class="section">
        <h3>Histórico Saúde</h3>
        <div class="form-row">
            <div class="form-group">
                <label for="doencas">Doenças</label>
                <input type="text" id="doencas" name="doencas" placeholder="Doenças">
            </div>

            <div class="form-group">
                <label for="medicamentos">Medicamentos</label>
                <input type="text" id="medicamentos" name="medicamentos" placeholder="Medicamentos">
            </div>

            <div class="form-group">
                <label for="problemas-intestinais">Problemas intestinais</label>
                <input type="text" id="problemas-intestinais" name="problemas-intestinais" placeholder="Problemas intestinais">
            </div>
        </div>
    </div>

    <!-- DIV de Histórico Vida Saudável -->
    <div class="section">
        <h3>Histórico Vida Saudável</h3>
        <div class="form-row">
            <div class="form-group">
                <label for="fumante">Fumante</label>
                <input type="text" id="fumante" name="fumante" placeholder="Quanto tempo?">
            </div>

            <div class="form-group">
                <label for="consome-alcool">Consome álcool</label>
                <select id="consome-alcool" name="consome-alcool">
                    <option value="nunca">Nunca</option>
                    <option value="ocasionalmente">Ocasionalmente</option>
                    <option value="frequentemente">Frequentemente</option>
                </select>
            </div>
        </div>

        <!-- DIV de Objetivos -->
        <div class="form-row">
            <div class="form-group">
                <label for="objetivos">Objetivos</label>
                <input type="text" id="objetivos" name="objetivos" placeholder="Objetivos">
            </div>

            <div class="form-group">
                <label for="alergia-alimentar">Alergia alimentar</label>
                <input type="text" id="alergia-alimentar" name="alergia-alimentar" placeholder="Alimentos">
            </div>  
        </div>
        <div class="form-actions">
            <button type="button" onclick="fechar()">Fechar</button>
            <button type="submit">Salvar e Criar Cardápio</button>
        </div>
    </form>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Anamnese Nutricional</title>
    <script language="javascript">
        function mascara(src, mask) {
            var i = src.value.length;
            var saida = mask.substring(1, 2);
            var texto = mask.substring(i);
            if (texto.substring(0, 1) != saida) {
                src.value += texto.substring(0, 1);
            }
        }

        function calcularCalorias() {
            var peso = parseFloat(document.getElementById('peso').value);
            var altura = parseFloat(document.getElementById('altura').value) / 100;
            var idade = parseInt(document.getElementById('idade').value);
            var genero = document.getElementById('genero').value;
            var nivelAtividade = document.getElementById('nivel-atividade').value;
            var objetivo = document.getElementById('objetivo').value;
            var estado = document.getElementById('estado').value;
            var pctGordura = parseFloat(document.getElementById('pct-gordura').value);

            if (!peso || !altura || !idade || !genero || !nivelAtividade || !objetivo || !estado || !pctGordura) {
                return;
            }

            // Calcular Massa Magra
            var massaMagra = peso * (1 - pctGordura / 100);

            // Calcular o IMC
            var imc = peso / (altura * altura);

            // Exibir o IMC no campo readonly
            document.getElementById('imc').value = imc.toFixed(2);

            // Determinar o nível do IMC
            var resultado = document.getElementById('resultado');
            if (imc < 18.5) {
                resultado.textContent = 'IMC: ' + imc.toFixed(2) + ' - Abaixo do peso';
            } else if (imc >= 18.5 && imc < 25) {
                resultado.textContent = 'IMC: ' + imc.toFixed(2) + ' - Peso normal';
            } else if (imc >= 25 && imc < 30) {
                resultado.textContent = 'IMC: ' + imc.toFixed(2) + ' - Sobrepeso';
            } else if (imc >= 30 && imc < 35) {
                resultado.textContent = 'IMC: ' + imc.toFixed(2) + ' - Obesidade grau I';
            } else if (imc >= 35 && imc < 40) {
                resultado.textContent = 'IMC: ' + imc.toFixed(2) + ' - Obesidade grau II';
            } else {
                resultado.textContent = 'IMC: ' + imc.toFixed(2) + ' - Obesidade grau III';
            }

            // Calcular TMB usando Katch-McArdle
            var tmb = 370 + (21.6 * massaMagra);
            document.getElementById('tmb').value = tmb.toFixed(2) + ' kcal';

            // Calcular TDEE
            var fatorAtividade;
            switch (nivelAtividade) {
                case 'sedentario':
                    fatorAtividade = 1.2;
                    break;
                case 'atividade-leve':
                    fatorAtividade = 1.375;
                    break;
                case 'atividade-moderada':
                    fatorAtividade = 1.55;
                    break;
                case 'atividade-intensa':
                    fatorAtividade = 1.725;
                    break;
                case 'atividade-muito-intensa':
                    fatorAtividade = 1.9;
                    break;
            }
            var tdee = tmb * fatorAtividade;
            document.getElementById('tdee').value = tdee.toFixed(2) + ' kcal';

            // Calcular calorias diárias necessárias com base no objetivo
            var consumoDiario;
            switch (objetivo) {
                case 'emagrecer':
                    consumoDiario = tdee - 500;
                    break;
                case 'manter-peso':
                    consumoDiario = tdee;
                    break;
                case 'ganhos-secos':
                    consumoDiario = tdee + 250;
                    break;
                case 'ganhos-agressivos':
                    consumoDiario = tdee + 500;
                    break;
            }
            document.getElementById('consumo').value = consumoDiario.toFixed(2) + ' kcal';

            // Calcular macronutrientes
            var proteina, gordura, carboidratos;
            switch (estado) {
                case 'magro':
                    proteina = peso * 2.2;
                    gordura = peso * 1.0;
                    carboidratos = (consumoDiario - (proteina * 4) - (gordura * 9)) / 4;
                    break;
                case 'consideravel':
                    proteina = peso * 2.0;
                    gordura = peso * 1.0;
                    carboidratos = (consumoDiario - (proteina * 4) - (gordura * 9)) / 4;
                    break;
                case 'falso-magro':
                    proteina = peso * 2.2;
                    gordura = peso * 1.2;
                    carboidratos = (consumoDiario - (proteina * 4) - (gordura * 9)) / 4;
                    break;
                case 'acima-peso':
                    proteina = peso * 1.8;
                    gordura = peso * 0.8;
                    carboidratos = (consumoDiario - (proteina * 4) - (gordura * 9)) / 4;
                    break;
            }
            document.getElementById('proteina').value = proteina.toFixed(2) + ' g';
            document.getElementById('gordura').value = gordura.toFixed(2) + ' g';
            document.getElementById('carboidratos').value = carboidratos.toFixed(2) + ' g';
        }

        function fechar() {
            window.close();
        }
    </script>
    <link rel="stylesheet" href="cadastro.css">
</head>
<body>
<div class="container">
    <h2>Dobras Cutâneas</h2>
    <form action="recebe_cadastro.php" method="post">
        <!-- DIV de Dados Pessoais -->
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
                    <input type="number" id="idade" name="idade" oninput="calcularCalorias()">
                </div>

                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <select id="genero" name="sexo" onchange="calcularCalorias()">
                        <option value="">Selecione</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- DIV de Medidas Antropométricas -->
        <div class="section">
            <h3>Medidas Antropométricas</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" id="peso" name="peso" step="0.1" oninput="calcularCalorias()">
                </div>

                <div class="form-group">
                    <label for="altura">Altura (cm)</label>
                    <input type="number" id="altura" name="altura" step="0.1" oninput="calcularCalorias()">
                </div>

                <div class="form-group">
                    <label for="pct-gordura">Percentual de Gordura (%)</label>
                    <input type="number" id="pct-gordura" name="pct-gordura" step="0.1" oninput="calcularCalorias()">
                </div>

                <div class="form-group">
                    <label for="imc">IMC</label>
                    <input type="text" id="imc" readonly>
                </div>
            </div>

            <p id="resultado"></p>
        </div>

        <!-- DIV de Atividade Física -->
        <div class="section">
            <h3>Atividade Física</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="nivel-atividade">Nível de Atividade</label>
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
                    <label for="objetivo">Objetivo</label>
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

        <!-- DIV de Resultados -->
        <div class="section">
            <h3>Resultados</h3>
            <div class="form-row">
                <div class="form-group">
                    <label for="tmb">Taxa Metabólica Basal (TMB)</label>
                    <input type="text" id="tmb" readonly>
                </div>

                <div class="form-group">
                    <label for="tdee">Total Daily Energy Expenditure (TDEE)</label>
                    <input type="text" id="tdee" readonly>
                </div>

                <div class="form-group">
                    <label for="consumo">Consumo Diário de Calorias</label>
                    <input type="text" id="consumo" readonly>
                </div>

                <div class="form-group">
                    <label for="proteina">Proteína (g)</label>
                    <input type="text" id="proteina" readonly>
                </div>

                <div class="form-group">
                    <label for="gordura">Gordura (g)</label>
                    <input type="text" id="gordura" readonly>
                </div>

                <div class="form-group">
                    <label for="carboidratos">Carboidratos (g)</label>
                    <input type="text" id="carboidratos" readonly>
                </div>
            </div>
        </div>

        <!-- Botões de Ação -->
        <div class="form-actions">
            <button type="button" onclick="fechar()">Fechar</button>
            <button type="submit">Salvar e Criar Cardápio</button>
        </div>
    </form>
</div>
</body>
</html>

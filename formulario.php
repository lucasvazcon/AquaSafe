<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | AquaSafe</title>

</head>
<link rel="stylesheet" href="formulario.css">

<body>
    <div class="box">
        <form action="salvar.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="inputUser" placeholder=" " required>
                    <label for="usuario" class="labelInput">Nome de Usuário</label>
                </div>

                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" placeholder=" " required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <br><br>
                <div class="inputBox">
                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="inputUser" placeholder=" " required>
                    <label for="confirmar_senha" class="labelInput">Confirmar Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required placeholder=" ">
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required placeholder=" " maxlength="14">
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required placeholder=" ">
                    <label for="email" class="labelInput">E-mail</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required placeholder=" " maxlength="15" inputmode="numeric">
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>

                <br>

                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>

                <br><br>

                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>

                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required placeholder=" ">
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required placeholder=" ">
                    <label for="estado" class="labelInput">Estado</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required placeholder=" ">
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>

                <br><br>

                <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>
    </div>

    <script>
        const telefone = document.getElementById('telefone');
        const cpf = document.getElementById('cpf');
        const form = document.querySelector('form');

        // TELEFONE
        telefone.addEventListener('input', () => {
            let v = telefone.value.replace(/\D/g, '');

            v = v.replace(/^(\d{2})(\d)/g, '($1) $2');
            v = v.length > 10 ?
                v.replace(/(\d{5})(\d{4})$/, '$1-$2') :
                v.replace(/(\d{4})(\d{4})$/, '$1-$2');

            telefone.value = v;
        });

        // CPF máscara
        cpf.addEventListener('input', () => {
            let v = cpf.value.replace(/\D/g, '');

            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d)/, '$1.$2');
            v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

            cpf.value = v;
        });

        // validar CPF
        function validarCPF(cpf) {
            cpf = cpf.replace(/\D/g, '');
            if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

            let soma = 0;
            for (let i = 0; i < 9; i++) soma += cpf[i] * (10 - i);

            let resto = (soma * 10) % 11;
            if (resto === 10) resto = 0;
            if (resto != cpf[9]) return false;

            soma = 0;
            for (let i = 0; i < 10; i++) soma += cpf[i] * (11 - i);

            resto = (soma * 10) % 11;
            if (resto === 10) resto = 0;

            return resto == cpf[10];
        }

        // SUBMIT
        form.addEventListener('submit', (e) => {

            const email = document.getElementById('email').value;

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert('Email inválido!');
                e.preventDefault();
                return;
            }

            if (telefone.value.length < 14) {
                alert('Telefone incompleto!');
                e.preventDefault();
                return;
            }

            if (!validarCPF(cpf.value)) {
                alert('CPF inválido!');
                e.preventDefault();
                return;
            }

        });
    </script>

</body>

</html>
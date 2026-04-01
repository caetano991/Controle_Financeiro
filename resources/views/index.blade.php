<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/appIndex.css'])
    <title>FinançasPro</title>
</head>
<body>
    
<nav class="nav">
  <div class="container">
    <p class="title-financas">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
      <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
      <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
      <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
      </svg>
       FinançasPro
      </p>

    @if ($statusFinanceiro == 1) 
      <span class="badge bg-success-subtle text-success px-3 py-2 fs-6 rounded-pill">
        📈 Você está RICO
      </span>

    @elseif($statusFinanceiro == 2)
      <span class="badge bg-primary-subtle text-success px-3 py-2 fs-6 rounded-pill">
        😳 Você está ZERADO
      </span>

    @else
      <span class="badge bg-danger-subtle text-success px-3 py-2 fs-6 rounded-pill">
        📉 Você está no VERMELHO
      </span>

    @endif

    <div class="criar-deletar">
      <!-- CRIAR REGISTRO -->
    
      <div class="btn-criar">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTransacao">
          ✅   Criar Registro
        </button>
      </div>

      <!-- LIMPAR DADOS -->
        <form action="" method="POST">
          @csrf
          @method('DELETE')
          <div class="btn-deletar">
            <button class="btn btn-danger">↪ Limpar Registros</button>
          </div>
        </form>    
    </div>
  
  </div>
</nav>


<!-- Campos de valores (receita/despesa/saldo) -->

<div class="corpo">
   <span class="titulo-meu-dinheiro">Meu Dinheiro</span>

    <div class="corpo-divs-status">

      <div class="div-receita">
        <span class="titulo-div-receita">Receita</span>
          <div class="div-conteudo-receita">
            <p class="conteudo-receita">R$: 
              {{ number_format($receita, 2, ',', '.') }}
            </p>
            <img src="" alt="">
          </div>
      </div>

      <div class="div-despesa">
        <span class="titulo-div-despesa">Despesa</span>
          <div class="div-conteudo-despesa">
            <p class="conteudo-despesa">R$:
              -{{ number_format($despesa, 2, ',', '.') }}
            </p>
          </div>  
      </div>

      <div class="div-saldo">
        <span class="titulo-div-saldo">Saldo</span>
          <div class="div-conteudo-saldo">
            <p class="conteudo-saldo">R$:
              {{ number_format($saldo, 2, ',', '.') }}
            </p>
          </div>
        </div>
    </div>


<!-- Tabela para view dos registros -->

    <div class="body-registros">
      <div class="corpo-divs-registros">
        <div class="transacoes-buscar">
          <h1 class="titulo-ultimas-transacoes">Últimas Transações</h1>  

          <!-- BUSCAR DADOS -->
          <div class="btn-buscar">
            <a class="btn btn-primary" href="{{ route('user-buscar') }}">
              🔍   Buscar Registro
            </a>
          </div>
        </div>

        <div class="registros">

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Categoria</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($registros as $registro)
                <tr>
                  <td>{{ $registro->data }}</td>
                  @if($registro->tipo == 'receita')

                    <td style="color: green;">{{ $registro->tipo }}</td>
                  
                  @else 

                    <td style="color: red;">{{ $registro->tipo }}</td>
                  
                  @endif                  
                  <td>{{ $registro->descricao }}</td>
                  <td>{{ $registro->categoria }}</td>
                  <td>R${{ $registro->valor }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>


<!-- Criação de Registros -->

<div class="modal fade" id="modalTransacao" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Adicionar Transação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('user-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Tipo</label>
                        <select class="form-select" name="tipo">
                            <option value="receita">Receita</option>
                            <option value="despesa">Despesa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                      <label for="data">Data</label>
                      <input type="date" class="form-control" name="data" id="data">
                  </div>

                  <div class="mb-3">
                      <label for="descricao">Descrição</label>
                      <input type="text" class="form-control" name="descricao" id="descricao">
                  </div>

                  <div class="mb-3">
                      <label for="categoria">Categoria</label>
                      <input type="text" class="form-control" name="categoria" id="categoria">
                  </div>

                  <div class="mb-3">
                      <label for="valor">Valor</label>
                      <input type="number" class="form-control" name="valor" id="valor">
                  </div>

                    <button type="submit" class="btn btn-dark w-100">Adicionar</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
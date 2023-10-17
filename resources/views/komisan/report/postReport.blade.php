<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Report de Postagens</title>
  <style>
    /* CSS base para os checkboxes */
    .report-checkbox-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .report-checkbox-label {
        display: flex;
        align-items: center;
    }

    .report-checkbox-label .report-checkbox-input {
        display: none;
    }

    .report-checkbox-label .report-checkbox-custom {
        margin-right: 10px;
        width: 18px;
        height: 18px;
        border: 2px solid #43abae;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .report-checkbox-label .report-checkbox-custom i {
        display: none;
        color: #43abae;
    }

    .report-checkbox-label .report-checkbox-input:checked + .report-checkbox-custom i {
        display: block;
    }

    .report-checkbox-label .report-checkbox-label-text {
        font-size: 18px;
    }

    .report-button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 1.1em;
        background-color: #43abae;
        border: none;
        border-radius: 8px;
        color: white;
        cursor: pointer;
    }

    .report-button:hover {
        background-color: #2d8c8e;
    }
    .report div{
        width: 100% ;
    }
    .container-cadastro-report{
        width: 50%;
        border-radius: 20px;
        padding: 20px;
        background-color: #fbfbfb;
        display: flex;
        box-shadow: 0 10px 20px rgba(0, 0, 0, .2);
    }
    .cadastro-report{
        width: 100%;
    }
  </style>
</head>
<body class="body-cadastro">
  <div class="container-cadastro-report">
      <form class="cadastro-report" method="POST" action="{{ route('report.post.store') }}">
        @csrf
        <h1>Reporte de Postagem</h1>
          
          <div class="input-box input-report">
            <input type="text" name="report_text" placeholder="Justifique o report de posts">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="post_id" value="{{ $post_id }}">
          </div>
          <div class="button-submit-pedido">
            <button class="report-button" type="submit">
              Enviar report
            </button>
          </div>
      </form>
  </div>
</body>
</html>

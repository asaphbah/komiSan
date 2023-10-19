<style>
main{
    width: 100%;
    height: 100%;
    background-color: white;
}
header{
    width: 100%;
    height: 30px;
    background-color: #333;
}
footer{
    width: 100%;
    height: 30px;
    background-color: #333;
}
div{
    margin: auto;
}
</style>
<main>
    <header>
        <h1>validação de email</h1>
    </header>
    <div>
        <p> {{$data['email']}}</p>
        <p>usuario: {{$data['name']}}</p>
        <a href="{{route('user.create.two', ['id' => $data['id']])}}">validar</a>
    </div>
    <footer>

    </footer>
</main>
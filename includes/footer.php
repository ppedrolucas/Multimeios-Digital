<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<style>
    /*RODAPE*/
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Josefin Sans', sans-serif;
    }
footer div.insta{
    background-image: linear-gradient(90deg, #00292E, #17DA48, #5EFF86);
    color: #fff;
    font-size: 14px;
    width: 100%;
    height: 96px;
    display: flex;
    align-items: center;
    padding: 32px;
      
}

</style>
<footer>
        <div class="insta">
            <p>&copy; <span id="ano"></span> Todos os direitos reservados</p>
        </div>
</footer>
<script>
    var data = document.getElementById('ano')
    var year = new Date()
    var newAno = year.getFullYear()

    data.innerHTML = newAno
</script>
<?php
ob_start(); //ARMAZENA MEUS DADOS EM CACHE
session_start(); //INICIA A SESSÃO
if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))){
    header("Location: index.php?acao=negado");
    exit;
}
include_once('sair.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Administrador</title>
    <script src="https://kit.fontawesome.com/1e32b8079d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex bg-zinc-900">
    <div class="w-84 bg-zinc-900 h-dvh p-2 text-white">
        <nav>
            <div class="bg-zinc-800 p-4 mb-2 rounded-lg font-bold">
                <h2 class="text-lg mb-4 text-zinc-400">Página do administrador</h2>

                <ul class="grid gap-2">
                    <li><a class="block w-full py-1 border-b-1 border-zinc-800 hover:border-zinc-100" href="#">Início</a></li>
                    <li><a class="block w-full py-1 border-b-1 border-zinc-800 hover:border-zinc-100" href="#">Buscar</a></li>
                </ul>
            </div>

            <div class="bg-zinc-800 p-4 mb-2 rounded-lg font-bold">
                <h2 class="text-lg mb-4 text-zinc-400">Sessões</h2>

                <div>
                    <ul class="grid gap-2">
                        <li><a class="block w-full py-1 border-b-1 border-zinc-800 hover:border-zinc-100" href="../home.php">Acervo</a></li>
                        <li><a class="block w-full py-1 border-b-1 border-zinc-800 hover:border-zinc-100" href="users.php">Usuários</a></li>
                        <li><a class="block w-full py-1 border-b-1 border-zinc-800 hover:border-zinc-100" href="bookks.php">Tabela de livros</a></li>
                        <li><a class="block w-full py-1 border-b-1 border-zinc-800 hover:border-zinc-100" href="history.php">Histórico</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="pt-2 pr-2 w-full">
        <header class="rounded-lg mb-2 w-full bg-zinc-800 text-white">
            <div class="py-4 px-8 flex items-center justify-between">                            
                <h3>Olá <?php echo $_SESSION['loginUser']?>, bem-vindo a central de administração</h1>
                <div>
                    <a href="?sair">Sair</a>
                </div>
            </div>
        </header>
        <main class="h-full bg-zinc-800 rounded-lg p-4 snap-y">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore pariatur corrupti quidem at assumenda voluptatum excepturi, dolorum delectus distinctio ullam quia inventore voluptas molestiae quae expedita eum. Explicabo, soluta provident?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident dolorum, facilis, earum ducimus quis similique sed itaque vero dignissimos fuga neque nemo id quibusdam, nobis cum voluptatibus nesciunt. Explicabo ad nostrum delectus doloremque similique consequatur iusto distinctio amet possimus est aut expedita, culpa non incidunt commodi nam qui temporibus cupiditate laudantium! Quisquam molestias accusamus dolore. Voluptas laboriosam neque provident repellat blanditiis nam id nemo itaque, saepe, ratione quod laudantium esse. Dolor temporibus laboriosam eius aut qui repellat blanditiis dolores cum tempora dolorum. Asperiores ipsa facere fugit in architecto iure soluta corporis reprehenderit ipsam! Aliquid omnis reiciendis eveniet, voluptatibus autem laboriosam voluptates sit fuga neque accusantium ab earum, dolor ea rerum pariatur eum maiores adipisci. Dolore labore, ut expedita consequatur animi possimus autem nisi quis officia, voluptatum in alias nostrum repellat modi provident amet ipsa dolorem doloribus eum ab quos molestiae vitae. Explicabo repellat mollitia adipisci, deleniti a quasi temporibus, quidem veritatis omnis delectus, quaerat veniam dolorum doloremque qui laudantium quam voluptates pariatur velit fugit. Reprehenderit, sunt earum! Suscipit necessitatibus deserunt dignissimos recusandae magni provident eaque minima commodi assumenda ipsa expedita voluptatem, a quis similique nulla officiis nemo excepturi! Cum ipsa delectus quos distinctio vero maiores expedita nam, facere esse obcaecati ex voluptas fugiat dicta aliquid in? Quae deleniti sapiente dolorem ex magnam, sint tempora dolores aspernatur nobis impedit neque voluptates illum maxime alias mollitia doloremque consequatur ipsam id, in earum enim culpa cupiditate, possimus facilis. Aut, ullam aspernatur. Ratione fugiat aperiam distinctio doloremque harum nobis voluptatem, explicabo nulla deleniti odio dolore in eius, natus doloribus corrupti ducimus quas! Quos dolores doloribus atque in accusantium laudantium culpa sequi repudiandae tempore quo, corrupti commodi deleniti delectus nostrum vel quidem provident ducimus dignissimos fugit explicabo nobis! Repellat corporis saepe repellendus possimus aut architecto, sit velit error explicabo dignissimos et harum earum nobis autem laboriosam voluptatem illum veritatis numquam adipisci ducimus. Nihil dolorem dicta necessitatibus velit architecto tenetur praesentium laboriosam ea modi cumque! Illum, incidunt vero iste veniam, nostrum perspiciatis odit laborum unde at quod accusamus eligendi nemo, exercitationem reprehenderit! Perspiciatis adipisci amet sit eius ipsum facilis voluptates, perferendis corporis, expedita voluptas, libero id inventore? Sit expedita necessitatibus ullam magnam a porro aspernatur odit delectus fugit maxime assumenda quam iure velit ipsa, voluptate mollitia libero in autem quasi accusantium provident placeat. Tempora doloribus iste qui ex in. Asperiores accusantium illum architecto ducimus ea est. Dicta veniam iure autem ratione, architecto ab rem molestias fugit nisi error corporis sit ipsam iusto atque vero nulla doloremque animi quasi accusamus quis delectus voluptas facilis explicabo suscipit. Voluptates animi sint reprehenderit eaque necessitatibus soluta? Eligendi, doloribus deserunt enim est repellat doloremque labore architecto nihil, aperiam facilis consequuntur esse accusantium sint autem ut ducimus? Accusamus necessitatibus accusantium, dolorum quis tenetur ipsa eum, fugit optio non consequuntur molestiae incidunt placeat? Culpa ducimus voluptate quibusdam sequi facere perspiciatis sapiente ipsa non adipisci dolorum qui vitae, repellendus accusantium impedit beatae eum odio, at possimus minus! Ad, ipsam molestiae! Odio eveniet vitae optio odit quas a nihil nesciunt facere cumque possimus laboriosam, architecto vel iure laborum. Natus ab eius obcaecati tenetur saepe quasi magnam in dignissimos eveniet architecto pariatur, excepturi et iure blanditiis tempore dolor? Quibusdam aperiam alias, nulla temporibus, vero error cum dicta inventore iure ad illum itaque ipsum mollitia consectetur eius possimus quaerat deserunt harum laudantium animi, rem rerum debitis quos magni. Cupiditate reprehenderit dicta animi officia reiciendis nihil quis nesciunt consequatur assumenda sint qui, dolorem exercitationem dignissimos earum dolorum? Eos alias ducimus provident tempore nobis. Reprehenderit praesentium necessitatibus porro sit ullam dolore amet voluptates, alias maiores nihil ad deserunt magnam natus quisquam, ut culpa quasi nobis sunt exercitationem fuga placeat? Modi soluta molestias perspiciatis impedit optio doloremque neque animi at quos officia provident est facilis labore quisquam, tenetur cupiditate sapiente consequuntur ea eligendi enim? Repellat laboriosam cumque mollitia provident optio debitis saepe est repudiandae beatae! Laboriosam accusamus autem qui id eos ipsam earum in fuga sed ipsa enim obcaecati beatae, ullam, nostrum veniam dolores possimus tempora quasi vero consequuntur quo eaque esse. Nobis velit atque eos, enim dignissimos, ad voluptatem voluptate amet expedita, eligendi quasi ea in. Dolor, sunt. Distinctio mollitia porro, labore sequi, dignissimos tenetur autem perferendis eum culpa beatae ad itaque repellat non vitae sit ullam nesciunt iusto qui. Illum eaque totam, non magnam nemo exercitationem laboriosam harum voluptas error, minima illo est qui pariatur? Ut dolore sint aperiam accusamus quisquam, asperiores eaque laudantium voluptate aliquid, deleniti, culpa quas odio quidem laborum molestias quasi. Modi, est odio asperiores quis perspiciatis facilis voluptate ab. Dolorum quisquam delectus minus aliquid explicabo quo, soluta veniam recusandae iste dolore nemo aperiam perspiciatis, repudiandae provident ad saepe et, odit sequi. Aperiam, cupiditate laborum! Non veniam maxime id, atque enim suscipit alias. Explicabo optio voluptate molestiae mollitia architecto maiores soluta saepe laudantium illo adipisci dignissimos tempora tenetur nesciunt facere nostrum est, fuga sunt et minima? Ducimus iste iure beatae, aliquam nihil inventore, doloremque assumenda tenetur voluptatem ipsam recusandae placeat? Nam ea nesciunt voluptas, laborum doloremque laboriosam vero quisquam eius architecto, ipsa corporis fugiat repellendus cupiditate tempore eos labore dicta. Fugit vel recusandae magni minima! Numquam consectetur asperiores eius ut voluptatem accusantium iusto dolor amet vel explicabo quisquam voluptas perferendis, tenetur fugit labore aperiam magnam cum impedit. Dolor veniam eum at officiis deleniti, optio mollitia quia nulla, dolorem libero unde facilis expedita et beatae obcaecati sequi accusantium porro nesciunt soluta qui quos dolores nobis. Possimus blanditiis harum accusamus voluptates distinctio sapiente commodi voluptatem enim quidem repellendus! Animi esse voluptas fugit. Aspernatur hic laborum dolorum accusantium est? Et fugiat atque eum voluptate iusto molestias vitae omnis nobis, quasi rerum fuga eligendi voluptatum aliquid dicta optio quas saepe ex, repudiandae deserunt totam sint alias nostrum molestiae nihil! Sapiente, sit omnis? Laboriosam modi a est illum id porro aperiam placeat eaque eveniet labore expedita repellendus repellat adipisci sed voluptate molestias harum fugiat illo, quasi consequuntur minima maiores? Pariatur illo iste beatae error officia quasi, enim mollitia fugit autem consequuntur veniam in expedita dicta aut amet ipsum rerum at porro aliquam obcaecati cumque nemo? Possimus perspiciatis quod eum totam!</p>
        </main>
    </div>
</body>
</html>
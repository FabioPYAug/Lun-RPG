<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title id="tituloPagina">Mistérios e Rituais</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Cinzel:wght@400;600&display=swap"
    rel="stylesheet" />
</head>

<body>
  <canvas id="space"></canvas>
  <header class="header">
    <div class="header-container">
      <h1 class="site-title" id="RitualNome">[Nome do Ritual]</h1>
      <button class="back-button" onclick="window.location.href='../index-inv.php'">
        &larr; Voltar
      </button>
    </div>
  </header>

  <div class="subheader">
    <nav>
      <ul>
        <li><a href="#efeito">Efeito</a></li>
      </ul>
    </nav>
  </div>

  <main class="main-content">
    <aside class="sidebar"></aside>

    <section class="content">
      <article>
        <div class="details-image">
          <img id="ritualImagem"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH3r_sM7QQ45aSu9y8Bug6rJtMB--YWkyAiA&s"
            alt="Imagem do Ritual" />
        </div>
        <section id="efeito">
          <h2 data-text="Efeito">Efeito</h2>
          <p id="op_padrao" data-text="">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
            enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <p id="op_discente" data-text=""><strong>Discente: </strong>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
            enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <p id="op_verdadeiro" data-text=""><strong>Verdadeiro: </strong>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
            enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </section>
        <br>

        <section id="detalhes">
          <table class="details-table">
            <tr>
              <th>Círculo</th>
              <td id="RitualCirculo">[Círculo]</td>
            </tr>
            <tr>
              <th>Custo</th>
              <td id="RitualCusto">[Custo]</td>
            </tr>
            <tr>
              <th>Alvo</th>
              <td id="RitualAlvo">[Alvo]</td>
            </tr>
            <tr>
              <th>Resistência</th>
              <td id="RitualResistencia">[Resistência]</td>
            </tr>
            <tr>
              <th>Duração</th>
              <td id="RitualDuracao">[Duração]</td>
            </tr>
            <tr>
              <th>Alcance</th>
              <td id="RitualAlcance">[Alcance]</td>
            </tr>
          </table>
          <br />
          <div class="details-container">
            <div class="details-text">
              <p>
                <strong>Tipo</strong>
              </p>
              <p>
                <strong>Alcance</strong>
              </p>
              <p>
                <strong>Efeito</strong>
              </p>
            </div>
          </div>
        </section>
      </article>
    </section>


  </main>
  <script>
    var canvas;
    var context;
    var screenH;
    var screenW;
    var stars = [];
    var fps = 50;
    var numStars = 200;

    $('document').ready(function () {

      screenH = $(window).height();
      screenW = $(window).width();

      canvas = $('#space');

      canvas.attr('height', screenH);
      canvas.attr('width', screenW);
      context = canvas[0].getContext('2d');

      for (var i = 0; i < numStars; i++) {
        var x = Math.round(Math.random() * screenW);
        var y = Math.round(Math.random() * screenH);
        var length = 1 + Math.random() * 3;
        var opacity = Math.random();

        var star = new Star(x, y, length, opacity);


        stars.push(star);
      }

      setInterval(animate, 750 / fps);
    });

    /**
     * Animate the canvas
     */
    function animate() {
      context.clearRect(0, 0, screenW, screenH);
      $.each(stars, function () {
        this.draw(context);
      })
    }

    /**
     * Star
     * 
     * @param int x
     * @param int y
     * @param int length
     * @param opacity
     */
    function Star(x, y, length, opacity) {
      this.x = parseInt(x);
      this.y = parseInt(y);
      this.length = parseInt(length);
      this.opacity = opacity;
      this.factor = 1;
      this.increment = Math.random() * .03;
    }

    /**
     * Draw a star
     * 
     * This function draws a start.
     * You need to give the contaxt as a parameter 
     * 
     * @param context
     */
    Star.prototype.draw = function () {
      context.rotate((Math.PI * 1 / 10));
      context.save();
      context.translate(this.x, this.y);

      if (this.opacity > 1) {
        this.factor = -1;
      }
      else if (this.opacity <= 0) {
        this.factor = 1;

        this.x = Math.round(Math.random() * screenW);
        this.y = Math.round(Math.random() * screenH);
      }

      this.opacity += this.increment * this.factor;

      context.beginPath()
      for (var i = 5; i--;) {
        context.lineTo(0, this.length);
        context.translate(0, this.length);
        context.rotate((Math.PI * 2 / 10));
        context.lineTo(0, - this.length);
        context.translate(0, - this.length);
        context.rotate(-(Math.PI * 6 / 10));
      }
      context.lineTo(0, this.length);
      context.closePath();
      context.fillStyle = "rgba(255, 255, 200, " + this.opacity + ")";
      context.shadowBlur = 5;
      context.shadowColor = '#ffff33';
      context.fill();

      context.restore();
    }

    const imageUrls = [
      '/LUR/OP/SIGILOS/A.png',
      '/LUR/OP/SIGILOS/B.png',
      '/LUR/OP/SIGILOS/C.png',
      '/LUR/OP/SIGILOS/D.png',
      '/LUR/OP/SIGILOS/E.png',
      '/LUR/OP/SIGILOS/F.png',
      '/LUR/OP/SIGILOS/G.png',
      '/LUR/OP/SIGILOS/H.png',
      '/LUR/OP/SIGILOS/I.png',
      '/LUR/OP/SIGILOS/J.png',
      '/LUR/OP/SIGILOS/K.png',
      '/LUR/OP/SIGILOS/L.png',
      '/LUR/OP/SIGILOS/M.png',
      '/LUR/OP/SIGILOS/N.png',
      '/LUR/OP/SIGILOS/O.png',
      '/LUR/OP/SIGILOS/P.png',
      '/LUR/OP/SIGILOS/Q.png',
      '/LUR/OP/SIGILOS/R.png',
      '/LUR/OP/SIGILOS/S.png',
      '/LUR/OP/SIGILOS/T.png',
      '/LUR/OP/SIGILOS/U.png',
      '/LUR/OP/SIGILOS/V.png',
      '/LUR/OP/SIGILOS/W.png',
      '/LUR/OP/SIGILOS/X.png',
      '/LUR/OP/SIGILOS/Y.png',
      '/LUR/OP/SIGILOS/Z.png'
    ];

    function createRandomImage() {
      const randomIndex = Math.floor(Math.random() * imageUrls.length);
      const img = document.createElement('img');
      img.src = imageUrls[randomIndex];
      img.classList.add('random-image');

      const x = Math.random() * (window.innerWidth - 100);
      const y = Math.random() * (window.innerHeight - 100);
      img.style.left = `${x}px`;
      img.style.top = `${y}px`;

      document.body.appendChild(img);

      setTimeout(() => {
        img.style.width = '100px';
        img.style.height = '100px';
        img.style.opacity = '0';
      }, 100);

      setTimeout(() => {
        img.remove();
      }, 2000);
    }

    setInterval(createRandomImage, 10);
  </script>
  <canvas id="canvasc"></canvas>
  <section class="dark-section">
    <div class="dark-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum.
      </p>
    </div>
  </section>
  <script>
    window.onload = function () {
      var canvas = document.getElementById("canvasc");
      var ctx = canvas.getContext("2d");
      var W = window.innerWidth;
      var H = window.innerHeight;
      canvas.width = W;
      canvas.height = H;

      var layers = [];
      layers.push({ size: 3, speed: 1, count: 50, particules: [] });
      layers.push({ size: 2, speed: 0.5, count: 50, particules: [] });
      layers.push({ size: 1, speed: 0.25, count: 50, particules: [] });

      function draw() {
        ctx.clearRect(0, 0, W, H);
        ctx.fillStyle = "rgb(228, 255, 255)";
        ctx.beginPath();

        for (var l of layers) {
          for (var p of l.particules) {
            var hs = l.size / 2;
            ctx.fillRect(p.x - hs, p.y - hs, hs * 2, hs * 2);
          }
        }
        ctx.fill();
        update();
      }

      function update() {
        for (var l of layers) {
          for (var p of l.particules) {
            p.y -= l.speed;

            // Se a partícula sair da tela, ela reaparece no topo em um local aleatório
            if (p.y < 0) {
              p.y = H;
              p.x = Math.random() * W;
            }
          }

          if (l.particules.length < l.count) {
            for (var i = 0; i < l.count - l.particules.length; i++) {
              var particule = { x: Math.random() * W, y: Math.random() * H };
              l.particules.push(particule);
            }
          }
        }
      }

      setInterval(draw, 25);
    };
  </script>
</body>

</html>

<style>
  #canvasc {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    overflow: hidden;
    z-index: 100;
  }

  .dark-section {
    position: relative;
    background-color: #000;
    color: #fff;
    text-align: center;
    padding: 50px 20px;
    overflow: hidden;
  }

  .dark-section h2,
  .dark-section p {
    margin: 10px auto;
    max-width: 1000px;
    font-family: "Cinzel", serif;
    text-align: center;
  }


  .dark-content {
    position: relative;
    z-index: 2;
  }

  .dark-section::before {
    content: '';
    position: absolute;
    top: -50px;
    left: 0;
    width: 100%;
    height: 50px;
    background: linear-gradient(0deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
    z-index: 1;
  }

  .random-image {
    position: fixed;
    width: 20px;
    height: 20px;
    transition: width 5s, height 5s, opacity 5s;
    opacity: 0.85;
    animation: shake2 0.5s ease-in-out infinite;
    z-index: -10;
    filter: brightness(0.4) saturate(10%) hue-rotate(50deg);
    overflow: hidden;
  }


  @keyframes shake {
    0% {
      transform: translateX(0);
    }

    25% {
      transform: translateX(-0.30px);
    }

    50% {
      transform: translateX(0.30px);
    }

    75% {
      transform: translateX(-0.30px);
    }

    100% {
      transform: translateX(0);
    }
  }

  @keyframes shake2 {
    0% {
      transform: translateX(0);
    }

    25% {
      transform: translateX(-1px);
    }

    50% {
      transform: translateX(1px);
    }

    75% {
      transform: translateX(-1px);
    }

    100% {
      transform: translateX(0);
    }
  }

  @keyframes float {
    0% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }

    100% {
      transform: translateY(0);
    }
  }


  @media (max-width: 768px) {
    .header-container {
      flex-direction: column;
      text-align: center;
    }

    .back-button {
      margin-top: 10px;
      width: 100%;
      box-sizing: border-box;
      z-index: 1000;
    }

    .main-content {
      flex-direction: column;
      padding: 0 10px;
    }

    .details-table {
      width: 100%;
    }

    .details-image img {
      max-width: 100%;
    }
  }

  body {
    font-family: "Roboto", sans-serif;
    background-color: #fff;
    color: rgb(155, 123, 20);
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  .header {
    background-color: #d4af37;
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
  }

  .header-small {
    padding: 10px;
  }

  .header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
  }

  .site-title {
    font-family: "Cinzel", serif;
    color: #fff;
    font-size: 2.2rem;
  }

  .back-button {
    background-color: transparent;
    color: #fff;
    border: 2px solid #fff;
    padding: 10px 20px;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10000;
  }

  .back-button:hover {
    background-color: #fff;
    color: #d4af37;
    transform: scale(1.1);
  }

  .subheader {
    background-color: #f9f6f0;
    padding: 10px;
    text-align: center;
  }

  .subheader nav ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
  }

  .subheader nav ul li {
    margin: 0 15px;
    z-index: 110000;
  }

  .subheader nav ul li a {
    text-decoration: none;
    color: #d4af37;
    font-weight: 500;
    transition: color 0.3s ease;
    z-index: 110000;
  }

  .subheader nav ul li a:hover {
    color: #b8860b;
    z-index: 110000;
  }

  .main-content {
    display: flex;
    flex: 1;
    max-width: 1600px;
    margin: 20px auto;
    gap: 20px;
    padding: 0 10px;
    flex-wrap: wrap;
  }

  .sidebar {
    display: none;
  }

  .content {
    flex: 1;
    background-color: #f9f6f0;
    padding: 20px;
    border-radius: 8px;
    font-size: 1.2rem;
  }

  h2 {
    font-family: "Cinzel", serif;
    color: rgb(214, 165, 4);
    margin-bottom: 10px;
    font-weight: bold;
    font-size: 1.8rem;
  }

  .details-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .details-text {
    display: flex;
    gap: 20px;
  }

  .details-image {
    text-align: center;
    margin-bottom: 20px;
  }

  .details-image img {
    width: 450px;
    height: 450px;
    border-radius: 8px;
    transition: transform 0.3s ease, border-color 0.3s ease;
  }

  .details-image img:hover {
    transform: scale(1.1);
  }

  .details-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    margin-left: 0;
    margin-right: auto;
  }

  .details-table th {
    width: 40%
  }

  .details-table th,
  .details-table td {
    border: 1px solid #d4af37;
    padding: 10px;
    text-align: left;
  }

  .details-table th {
    background-color: #d4af37;
    color: #fff;
  }

  .details-table td {
    background-color: #fff;
    color: #d4af37;
  }

  #space {
    position: absolute;
    top: 0;
    left: 0;
  }
</style>
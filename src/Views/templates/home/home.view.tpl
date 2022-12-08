<style>
    :root {
  --primary-border-radius: 0.625rem;
  --primary-background-color: #ffffff;
  --secondary-background-color: white;
  --terciary-background-color:hsl(6, 70%, 92%);
  --primary-font-color: #222;
  --secondary-font-color: white;
  --terciary-font-color: #e74c3c;
  --primary-button-color: #3c72e7;
  --primary-button-hover-color: hsl(225, 80%, 44%);
  --secondary-button-color: white;
  --font-primary-color: #333;
  --font-secondary-color: #6e6d81;
  --font-terciary-color: #2980b9;
  --font-inactive-color: #778;
  --font-error-color: #e74c3c;
  --input-primary-color: #f6fafd;
  --input-seconday-color: #fff;
  --input-inactive-color: #f0f0f0;
  --input-border-color: #999;
  --input-border-focus-color: #0065DE;
  --primary-button-bg-color: hsl(204, 80%, 80%);
  --primar-button-accent-color: #2980b9;
  --primary-button-font-color: white;
  --secondary-button-bg-color: rgba(41, 128, 185,0.1);
  --secondary-button-accent-color: #2980b9;
  --secondary-button-font-color: #2980b9;
}

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Neue Haas";
}

body {
  height: 100%;
  width: 100%;
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  grid-template-rows: [main-start] 50px [content-start] auto [content-end] 100px [main-end];
  gap: 2px;
  background-color: var(--primary-background-color);
  /* overflow: hidden; */
}

a {
    text-decoration: none;
}

.empty-state-container {
    grid-column: 1 / -1;
    grid-row: 1 / -1;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}


main {
  grid-column: 1 / -1;
  display: grid;
  grid-template-columns: 15.625rem auto;
  grid-template-rows: 4rem auto;
  grid-row: content;
  height: 100%;
  margin: 2rem 0;
  gap: 1rem;
}


.saludo {
  margin-bottom: 1em;
  grid-column: 2 / -1;
  grid-row: 1 / 2;
  display: flex;
  flex-flow: column nowrap;
}

.books-title {
  font-family: "P22";
  font-size: 2em;
  margin-bottom: .3em;
  color: var(--primary-font-color);
}

.book-subtitle {
  color: var(--font-secondary-color);
}

.books-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, 19rem);
  grid-auto-rows: 30rem;
  grid-column: 2 / -1;
  grid-row: 2 / -1;
  justify-content: space-between;
  /* column-gap: 1em !important; */
  row-gap: 2em;
}

.book-item {
  width: 100%;
  padding: 1.5em;
  border: 1px solid transparent;
  border-radius: var(--primary-border-radius);
  background-color: var(--secondary-background-color);
  display: flex;
  flex-flow: column;
  justify-content: center;
  align-content: space-between;
  transition: all 0.4s ease;
  text-overflow: ellipsis;
  overflow: hidden;
}

.book-image-container {
  background-color: var(--primary-background-color);
  display: grid;
  align-items: center;
  justify-items: center;
  width: 100%;
  flex: 70%;
  border-radius: .5rem;
}
.book-image {
  width: auto;
  height: 180px;
  object-fit: cover;
  transition:all 0.4s cubic-bezier(.25,.1,.28,2.36);
  transition-delay: 0.3s;
}

.book-description-container {
  flex: 30%;
  width: 100%;
  text-overflow: ellipsis;
  overflow: hidden;
  display: flex;
  flex-flow: column nowrap;
  justify-content: space-around;
  padding: 0.5em 0;
  align-items: center;
  align-content: space-between;
  margin: .5rem 0;
  position: relative;
}

.book-name {
  font-weight: bold;
  font-size: 1.3rem;
}

.book-autor {
    color: var(--font-secondary-color);
}

.book-precio {
    font-size: 1rem;
    color: var(--font-primary-color);
    font-weight: 600;
}

.book-button-container {
    display: flex;
    flex-flow: column nowrap;
}

.view-book-button, .add-to-cart-button {
    width: 100%;
    display: block;
    text-align: center;
    padding: .7em .5em;
    border-radius: .5em;
}

.view-book-button {
    color: var(--primary-button-color);
    margin-bottom: .5em;
    transition: .4s all ease-in-out;
}

.add-to-cart-button {
    background-color: var(--primary-button-color);
    color: var(--secondary-font-color);
    transition: .4s all ease-in-out;
}

 .formulario{
    
    background-color: #ffffff !important;
  }

footer {
  grid-row: content-end / main-end;
}

i.fa {
    font-family: "Font Awesome 5 Free" !important;
}

@media (hover: hover) {
  .header-item:hover {
    border-bottom: 1px solid var(--primary-button-color);
  }

  .header-item:nth-last-child(2),
  .header-item:last-child {
    border: 1px solid transparent;
  }

  .book-item:hover {
    box-shadow: 0 1em 2em 0.1em rgba(0, 0, 0, 0.1);
    transform: translateY(-1px);
  }

  .book-item:hover > .book-image-container > .book-image {
    transform: scale(1.15);
  }

  .sign-in:hover {
    background-color: var(--primary-button-color);
    color: var(--secondary-font-color);
    /* border-bottom: 1px solid transparent !important; */
    cursor: pointer;
  }

  .sign-up:hover {
    background-color: var(--secondary-button-color);
    color: var(--primary-font-color);
    /* border-bottom: 1px solid transparent !important; */
    cursor: pointer;
  }

  .sidebar-item:hover {
    background-color: var(--terciary-background-color);
    color: var(--terciary-font-color);
  }

  .view-book-button:hover {
    background-color: var(--terciary-background-color);
}

.add-to-cart-button:hover {
    background-color: var(--primary-button-hover-color);
}
}

</style>

<body style="background-color:white ;">
  
<section class="books-container">
    {{if hasProductos}}
        {{foreach productos}}
            <div class="book-item" id="{{codprd}}">
                <div class="book-image-container">
                    <img src="{{imagen}}" alt="{{nombreProducto}}" class="book-image" />
                </div>
                <div class="book-description-container">
                    <span class="book-name">{{nombreProducto}}</span>
                    <span class="book-autor">{{descripcionProducto}}</span>
                    <span class="book-precio">L.{{precio}}</span>
                </div>
                  <div class="book-button-container">
                      <form class="book-button-container" action="index.php?page=Mnt-Carretillaanon&mode=DEL&codprd={{codprd}}" method="post">
                          <input type="hidden" name="codprd" value="{{codprd}}">
                          <button class="book-button-container" type="submit">
                              <i class="add-to-cart-button">Quitar</i>
                          </button>
                      </form>
                  </div>
                  <div class="book-button-container">
                      <form class="book-button-container" action="index.php?page=Mnt-Carretillaanon&mode=INS&codprd={{codprd}}" method="post">
                          <input type="hidden" name="codprd" id="codprd" value="{{codprd}}">
                          <input type="hidden" name="crrctd" id="crrctd" value=1>
                          <input type="hidden" name="crrprc" id="crrprc" value="{{precio}}">
                          <button class="book-button-container" type="submit">
                              <i class="add-to-cart-button">Agregar al Carrito</i>
                          </button>
                      </form>
                  </div>
            </div>
        {{endfor productos}}
    {{endif hasProductos}}
    {{ifnot hasProductos}}
        <div class="empty-state-container">
            <img 
            src="http://localhost/Proyecto/public/imgs/emptystate.png" 
            alt="Vacio" 
            class="empty-state">
        </div>
    {{endifnot hasProductos}}
</section>

</body>


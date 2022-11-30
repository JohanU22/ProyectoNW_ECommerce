<head>
    <h1>Tutores Disponibles</h1>
</head>

<main>
    <h2>Listado de Tutores</h2>
    <span>Viendo {{totalTutores}} </span>
    <section>
        {{foreach misTutores}}
        <div class="card">
            <span>Nombre {{nombre}} </span>
            <div>
                <img src="{{img}}" alt="abc">
            </div>
            <button>Ver</button>
        </div>
        {{endfor misTutores}}
    </section>
</main>

<footer>

</footer>

<style>
    .cardHolder{
        display:flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .card{

    }


</style>
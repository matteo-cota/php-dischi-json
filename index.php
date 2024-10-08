<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dischi JSON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div id="app">
        <header class="text-center my-2 py-5 bar">
            <img src="img/logo-spotify.png" alt="Logo Spotify" class="logo">
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4" v-for="disco in dischi" :key="disco.title">
                    <div class="card">
                        <img :src="disco.poster" :alt="disco.title" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ disco.title }}</h5>
                            <p class="card-text">{{ disco.author }}</p>
                            <h5 class="text">{{ disco.year }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    dischi: []
                };
            },
            mounted() {
                axios.get('api/dischi.php')
                    .then(response => {
                        this.dischi = response.data;
                    })
                    .catch(error => {
                        console.error("Errore durante il caricamento dei dati:", error);
                    });
            }
        });
        app.mount('#app');
    </script>
</body>

</html>
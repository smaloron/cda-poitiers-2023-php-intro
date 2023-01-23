<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body {
        padding: 15px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin: 10px auto;
    }

    .form-grid-2-third {
        display: grid;
        grid-template-columns: 1fr 3fr;
        margin: 10px auto;
    }

    label {
        margin-right: 10px;
        text-align: right;
    }

    .qualities label {
        text-align: left;
    }

    .qualities input {
        text-align: right;
    }

    .description-input {
        width: 100%;
        height: 50%;
    }

    .grid-full {
        display: grid;
        grid-template-columns: 1fr;
    }
    </style>
</head>

<body>
    <form>
        <div class="form-grid-2-third">
            <label>Nom</label>
            <input type="text" name="nom">
        </div>

        <div class="form-grid">
            <div>
                <div class="form-grid">
                    <label>Force</label>
                    <input type="number" min="1" max="10" name="force">
                </div>
                <div class="form-grid">
                    <label>Endurance</label>
                    <input type="number" min="1" max="10" name="endurance">
                </div>
                <div class="form-grid">
                    <label>Agilité</label>
                    <input type="number" min="1" max="10" name="agilite">
                </div>
            </div>
            <div>
                <div class="form-grid">
                    <label>Intelligence</label>
                    <input type="number" min="1" max="10" name="intelligence">
                </div>
                <div class="form-grid">
                    <label>Sagesse</label>
                    <input type="number" min="1" max="10" name="sagesse">
                </div>
                <div class="form-grid">
                    <label>Charisme</label>
                    <input type="number" min="1" max="10" name="charisme">
                </div>
            </div>
        </div>

        <div class="form-grid">
            <div class="qualities">
                <h4>Qualités</h4>

                <div class="form-grid">
                    <input type="checkbox" name="qualities[]" value="Altruiste">
                    <label>Altruiste</label>
                </div>
                <div class="form-grid">
                    <input type="checkbox" name="qualities[]" value="Rusé">
                    <label>Rusé</label>
                </div>
                <div class="form-grid">
                    <input type="checkbox" name="qualities[]" value="Débrouillard">
                    <label>Débrouillard</label>
                </div>
                <div class="form-grid">
                    <input type="checkbox" name="qualities[]" value="Riche">
                    <label>Riche</label>
                </div>
            </div>

            <div>
                <h4>Description</h4>
                <textarea class="description-input" name="description"></textarea>
            </div>
        </div>

        <div class="grid-full">
            <button name="submit">Valider</button>
        </div>
    </form>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Commande #{{ $products[0]->commande_id }}</h2>
                <p><strong>Date de commande:</strong> {{ $products[0]->cmddate }}</p>
                <p><strong>Nom du client:</strong> {{ $products[0]->user_name }}</p>
                <p><strong>Email du client:</strong> {{ $products[0]->user_email }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID produit</th>
                            <th>Titre</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Prix x quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->prix }}</td>
                                <td>{{ $product->qte }}</td>
                                <td>${{ $product->qte * $product->prix }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Total:</strong></td>
                            <td>${{ $total }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Library Books</title>
    </head>
    <body>
        <div class="container">
            <h1>Here are all of the library books:</h1>

            {% if books is not empty %}
                <ul>
                    {% for book in books %}
                    <li><a href="/books/{{ book.getId }}"> {{ book.getTitle }} </a></li>
                    {% endfor %}
                </ul>
            {% else %}
                <p>There are no books in the library!</p>
            {% endif %}

            <h4>Add a new book:</h4>
            <form action="/books" method="post">
                <label for="title">Book title:</label>
                <input type="text" name="title" id="title">
                <button type="submit" class="btn-success">Add it!</button>
            </form>

            <form action="/delete_books" method="post">
                <button type="submit" class="btn-danger">Burn all books</button>
            </form>

            <h3><a href="/">Go home</a></h3>
        </div>
    </body>
</html>

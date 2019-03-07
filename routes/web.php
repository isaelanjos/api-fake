<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

/**
 * Basic routes
 */


/**
 * @api {get} / Página inicial
 * @apiGroup Basic
 * @apiDescription Teste da pagina inicial.
 *
 * @apiSuccessExample {text} Resposta de sucesso(200):
 *     HTTP/1.1 200 OK
 *        Hi, i am index page :)
 *
 * @apiError InternalServerError Ocorreu um erro durante o processamento da requisição.
 * @apiErrorExample Resposta de erro(500):
 *     HTTP/1.1 500 InternalServerError
 *     {
 *       "msg": "Cast to ObjectId failed"
 *     }
 */
$router->get(URL_INDEX, 'Controller@index');


/**
 * @api {get} /version Obter número da versão
 * @apiGroup Basic
 * @apiDescription Obtem o número da versão atual da API.
 *
 * @apiSuccessExample {text} Resposta de sucesso(200):
 *     HTTP/1.1 200 OK
 *        1.0.0
 *
 * @apiError InternalServerError Ocorreu um erro durante o processamento da requisição.
 * @apiErrorExample Resposta de erro(500):
 *     HTTP/1.1 500 InternalServerError
 *     {
 *       "msg": "Cast to ObjectId failed"
 *     }
 */
$router->get(URL_APP_VERSION_NUMBER, 'Controller@appVersionNumber');


/**
 * @api {get} /hello-world Hello World
 * @apiGroup Basic
 * @apiDescription Teste da pagina 'olá mundo'.
 *
 * @apiSuccessExample {text} Resposta de sucesso(200):
 *     HTTP/1.1 200 OK
 *        Hello World
 *
 * @apiError InternalServerError Ocorreu um erro durante o processamento da requisição.
 * @apiErrorExample Resposta de erro(500):
 *     HTTP/1.1 500 InternalServerError
 *     {
 *       "msg": "Cast to ObjectId failed"
 *     }
 */
$router->get(URL_HELLO_WORLD, 'Controller@helloWorld');

/**
 * Jsonplaceholder routes
 */

/**
 * @api {get} /posts Obter todos os posts
 * @apiGroup Posts
 * @apiDescription Retorna uma lista de todos os posts, seus autores, seus comentários e os autores dos comentários.
 *
 * @apiHeader Content-Type Estabelece o tipo de dados enviados na requisição.
 * @apiHeader Accept Estabelece o tipo de dados aceito como resposta.
 * @apiHeaderExample Cabeçalho:
 *    Content-Type: application/x-www-form-urlencoded
 *    Accept: application/json
 *
 * @apiSuccessExample {json} Resposta de sucesso(200):
 *     HTTP/1.1 200 OK
 *  [
 *    {
 *        "userId": 1,
 *        "id": 1,
 *        "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
 *        "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
 *        "author": {
 *            "id": 1,
 *            "name": "Leanne Graham",
 *            "username": "Bret",
 *            "email": "Sincere@april.biz",
 *            "address": {
 *                "street": "Kulas Light",
 *                "suite": "Apt. 556",
 *                "city": "Gwenborough",
 *                "zipcode": "92998-3874",
 *                "geo": {
 *                    "lat": "-37.3159",
 *                    "lng": "81.1496"
 *                }
 *            },
 *            "phone": "1-770-736-8031 x56442",
 *            "website": "hildegard.org",
 *            "company": {
 *                "name": "Romaguera-Crona",
 *                "catchPhrase": "Multi-layered client-server neural-net",
 *                "bs": "harness real-time e-markets"
 *            }
 *        },
 *        "comments": [
 *            {
 *                "postId": 1,
 *                "id": 1,
 *                "name": "id labore ex et quam laborum",
 *                "email": "Eliseo@gardner.biz",
 *                "body": "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 2,
 *                "name": "quo vero reiciendis velit similique earum",
 *                "email": "Jayne_Kuhic@sydney.com",
 *                "body": "est natus enim nihil est dolore omnis voluptatem numquam\net omnis occaecati quod ullam at\nvoluptatem error expedita pariatur\nnihil sint nostrum voluptatem reiciendis et"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 3,
 *                "name": "odio adipisci rerum aut animi",
 *                "email": "Nikita@garfield.biz",
 *                "body": "quia molestiae reprehenderit quasi aspernatur\naut expedita occaecati aliquam eveniet laudantium\nomnis quibusdam delectus saepe quia accusamus maiores nam est\ncum et ducimus et vero voluptates excepturi deleniti ratione"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 4,
 *                "name": "alias odio sit",
 *                "email": "Lew@alysha.tv",
 *                "body": "non et atque\noccaecati deserunt quas accusantium unde odit nobis qui voluptatem\nquia voluptas consequuntur itaque dolor\net qui rerum deleniti ut occaecati"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 5,
 *                "name": "vero eaque aliquid doloribus et culpa",
 *                "email": "Hayden@althea.biz",
 *                "body": "harum non quasi et ratione\ntempore iure ex voluptates in ratione\nharum architecto fugit inventore cupiditate\nvoluptates magni quo et"
 *            }
 *        ]
 *    },
 *    {
 *        "userId": 1,
 *        "id": 1,
 *        "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
 *        "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
 *        "author": {
 *            "id": 1,
 *            "name": "Leanne Graham",
 *            "username": "Bret",
 *            "email": "Sincere@april.biz",
 *            "address": {
 *                "street": "Kulas Light",
 *                "suite": "Apt. 556",
 *                "city": "Gwenborough",
 *                "zipcode": "92998-3874",
 *                "geo": {
 *                    "lat": "-37.3159",
 *                    "lng": "81.1496"
 *                }
 *            },
 *            "phone": "1-770-736-8031 x56442",
 *            "website": "hildegard.org",
 *            "company": {
 *                "name": "Romaguera-Crona",
 *                "catchPhrase": "Multi-layered client-server neural-net",
 *                "bs": "harness real-time e-markets"
 *            }
 *        },
 *        "comments": [
 *            {
 *                "postId": 1,
 *                "id": 1,
 *                "name": "id labore ex et quam laborum",
 *                "email": "Eliseo@gardner.biz",
 *                "body": "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 2,
 *                "name": "quo vero reiciendis velit similique earum",
 *                "email": "Jayne_Kuhic@sydney.com",
 *                "body": "est natus enim nihil est dolore omnis voluptatem numquam\net omnis occaecati quod ullam at\nvoluptatem error expedita pariatur\nnihil sint nostrum voluptatem reiciendis et"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 3,
 *                "name": "odio adipisci rerum aut animi",
 *                "email": "Nikita@garfield.biz",
 *                "body": "quia molestiae reprehenderit quasi aspernatur\naut expedita occaecati aliquam eveniet laudantium\nomnis quibusdam delectus saepe quia accusamus maiores nam est\ncum et ducimus et vero voluptates excepturi deleniti ratione"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 4,
 *                "name": "alias odio sit",
 *                "email": "Lew@alysha.tv",
 *                "body": "non et atque\noccaecati deserunt quas accusantium unde odit nobis qui voluptatem\nquia voluptas consequuntur itaque dolor\net qui rerum deleniti ut occaecati"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 5,
 *                "name": "vero eaque aliquid doloribus et culpa",
 *                "email": "Hayden@althea.biz",
 *                "body": "harum non quasi et ratione\ntempore iure ex voluptates in ratione\nharum architecto fugit inventore cupiditate\nvoluptates magni quo et"
 *            }
 *        ]
 *    },
 *    {...}
 *  ]
 *
 * @apiError BadRequest Chamada realizada sem parâmetros de pesquisa ou com parâmetros inválidos.
 * @apiErrorExample Resposta de erro(400)
 *     HTTP/1.1 400 BadRequest
 *     {
 *       "msg": "postId not supplied."
 *     }
 *
 * @apiError NotFound O userId informado não é válido..
 * @apiErrorExample Resposta de erro(404):
 *     HTTP/1.1 404 NotFound
 *     {
 *       "message": "Client error: postId not found"
 *     }
 *
 * @apiError InternalServerError Ocorreu um erro durante o processamento da requisição.
 * @apiErrorExample Resposta de erro(500):
 *     HTTP/1.1 500 InternalServerError
 *     {
 *       "msg": "Cast to ObjectId failed"
 *     }
 */
$router->get(URL_POSTS, 'PostController@getPosts');

/**
 * @api {get} /posts/:id Obter post por id
 * @apiGroup Posts
 * @apiDescription Retorna um único post identificado pelo id, seu autor, e uma lista de seus comentários e seus respectivos autores.
 *
 * @apiHeader Content-Type Estabelece o tipo de dados enviados na requisição.
 * @apiHeader Accept Estabelece o tipo de dados aceito como resposta.
 * @apiHeaderExample Cabeçalho:
 *    Content-Type: application/x-www-form-urlencoded
 *    Accept: application/json
 *
 * @apiParam {UUID} postId Identificador único do post
 *
 * @apiSuccessExample {json} Resposta de sucesso(200):
 *     HTTP/1.1 200 OK
 *    {
 *        "userId": 1,
 *        "id": 1,
 *        "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
 *        "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
 *        "author": {
 *            "id": 1,
 *            "name": "Leanne Graham",
 *            "username": "Bret",
 *            "email": "Sincere@april.biz",
 *            "address": {
 *                "street": "Kulas Light",
 *                "suite": "Apt. 556",
 *                "city": "Gwenborough",
 *                "zipcode": "92998-3874",
 *                "geo": {
 *                    "lat": "-37.3159",
 *                    "lng": "81.1496"
 *                }
 *            },
 *            "phone": "1-770-736-8031 x56442",
 *            "website": "hildegard.org",
 *            "company": {
 *                "name": "Romaguera-Crona",
 *                "catchPhrase": "Multi-layered client-server neural-net",
 *                "bs": "harness real-time e-markets"
 *            }
 *        },
 *        "comments": [
 *            {
 *                "postId": 1,
 *                "id": 1,
 *                "name": "id labore ex et quam laborum",
 *                "email": "Eliseo@gardner.biz",
 *                "body": "laudantium enim quasi est quidem magnam voluptate ipsam eos\ntempora quo necessitatibus\ndolor quam autem quasi\nreiciendis et nam sapiente accusantium"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 2,
 *                "name": "quo vero reiciendis velit similique earum",
 *                "email": "Jayne_Kuhic@sydney.com",
 *                "body": "est natus enim nihil est dolore omnis voluptatem numquam\net omnis occaecati quod ullam at\nvoluptatem error expedita pariatur\nnihil sint nostrum voluptatem reiciendis et"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 3,
 *                "name": "odio adipisci rerum aut animi",
 *                "email": "Nikita@garfield.biz",
 *                "body": "quia molestiae reprehenderit quasi aspernatur\naut expedita occaecati aliquam eveniet laudantium\nomnis quibusdam delectus saepe quia accusamus maiores nam est\ncum et ducimus et vero voluptates excepturi deleniti ratione"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 4,
 *                "name": "alias odio sit",
 *                "email": "Lew@alysha.tv",
 *                "body": "non et atque\noccaecati deserunt quas accusantium unde odit nobis qui voluptatem\nquia voluptas consequuntur itaque dolor\net qui rerum deleniti ut occaecati"
 *            },
 *            {
 *                "postId": 1,
 *                "id": 5,
 *                "name": "vero eaque aliquid doloribus et culpa",
 *                "email": "Hayden@althea.biz",
 *                "body": "harum non quasi et ratione\ntempore iure ex voluptates in ratione\nharum architecto fugit inventore cupiditate\nvoluptates magni quo et"
 *            }
 *        ]
 *    }
 *
 * @apiError BadRequest Chamada realizada sem parâmetros de pesquisa ou com parâmetros inválidos.
 * @apiErrorExample Resposta de erro(400)
 *     HTTP/1.1 400 BadRequest
 *     {
 *       "msg": "postId not supplied."
 *     }
 *
 * @apiError NotFound O userId informado não é válido..
 * @apiErrorExample Resposta de erro(404):
 *     HTTP/1.1 404 NotFound
 *     {
 *       "message": "Client error: postId not found"
 *     }
 *
 * @apiError InternalServerError Ocorreu um erro durante o processamento da requisição.
 * @apiErrorExample Resposta de erro(500):
 *     HTTP/1.1 500 InternalServerError
 *     {
 *       "msg": "Cast to ObjectId failed"
 *     }
 */
$router->get(URL_POST_BY_ID, 'PostController@getPostById');

/**
 * @api {post} /posts Salvar novo post
 * @apiGroup Posts
 * @apiDescription Cria um novo post. Deve ser informado um userId caso contrário deve ser informado um objeto(author) com os dados para cadastrar um novo usuário.
 *
 * <b>Ao enviar um POST para o jsonplaceholder é retornado um novo id(de usuário ou de post) e o código htttp 201 em caso de sucesso. Foi utilizado esse retorno de sucesso para validar a criação do novo usuário e do novo post.</b>
 *
 * @apiHeader Content-Type Estabelece o tipo de dados enviados na requisição.
 * @apiHeader Accept Estabelece o tipo de dados aceito como resposta.
 * @apiHeaderExample Cabeçalho:
 *    Content-Type: application/x-www-form-urlencoded
 *    Accept: application/json
 *
 * @apiParam {UUID} userId Identificador único do autor
 * @apiParam {String} title Titulo do post
 * @apiParam {String} body Descrição do post
 * @apiParam {Object} author Objeto para criação do novo usuário
 *
 * @apiSuccessExample {json} Resposta de sucesso(200):
 *     HTTP/1.1 200 OK
 *    {
 *        "userId": "1",
 *        "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
 *        "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
 *        "id": 101
 *    }
 *
 * @apiError BadRequest Chamada realizada sem parâmetros de pesquisa ou com parâmetros inválidos.
 * @apiErrorExample Resposta de erro(400)
 *     HTTP/1.1 400 BadRequest
 *     {
 *       "msg": "UserId and author data not supplied."
 *     }
 *
 * @apiError NotFound O userId informado não é válido..
 * @apiErrorExample Resposta de erro(404):
 *     HTTP/1.1 404 NotFound
 *     {
 *       "message": "Client error"
 *     }
 *
 * @apiError InternalServerError Ocorreu um erro durante o processamento da requisição.
 * @apiErrorExample Resposta de erro(500):
 *     HTTP/1.1 500 InternalServerError
 *     {
 *       "msg": "Cast to ObjectId failed"
 *     }
 */
$router->post(URL_POSTS, 'PostController@savePost');

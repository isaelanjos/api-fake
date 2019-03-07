# Teste API fake com JsonPlaceHolder 

-----
### Tecnologias utilizadas:
* PHP7.2
* Composer
* NPM
* Lumen/Laravel framework
* Git

### Foi testado no seguinte ambiente:
> Docker version 18.09.3, build 774a1f4
> Linux mint-pc 4.15.0-20-generic #21-Ubuntu x86_64 x86_64 x86_64 GNU/Linux
> Linux Mint 19.1 Tessa

### Árvore de arquios:
### Foi utilizado o template padrão do Lumen, e adicionado as seguintes modificações:
* Criado o diretório ./consts de constantes para armazenas rotas, número de versão, em geral dados estáticos que precisam ser carregados uma única vez no app e quem não envolvem tanta lógica a ponto de ser preciso criar traits.
* As constantes estão sendo incluídas no arquivo de app principal do bootstrap em ./bootstrap/appp.php.
* Criado o diretório ./docker para os arquivos auxiliares que serão solicitados pelo Dockerfile e docker-compose.yml.
* A documentação da API foi feita no arquivo de rotas principal, no momento são apenas 6 rotas(sendo 3 com lógica), em uma situação de um número maior de rotas, poderiam ser separados por features ou módulos para melhor organização. 
* A documentação da API é gerada em ./public/rest-api-docs, e é configurado um server no Nginx, se fosse algo mais completo e real, poderia ser adicionado um proxy transparente junto com um balance para o app, e o proxy para redirecionar url da documentação.
* Foi criado dois models, apenas para filtro de campos e limpeza do objeto. Se fosse o caso em um app mais complexo, poderiamos conectrar lógica de relacionamentos many-to-many nos models e chamar os validators antes de submeter qualquer request.
* O PostController.php, foi dividido em 3 partes, que futuramente poderiam se tornar camadas. 
    * Os métodos restAction, que futuramente poderiam se tornar um serviço provido pelos provedores do Laravel, serviço apenas para consultas rest, concentrando toda lógica do Guzzle nessa camada.
    * Os métodos auxiliares, que futuramente poderiam se tornar helpers ou traits dependendo do contexto. Foi criado uma trait para deixar de exemplo. 
    * Por fim a camada do controller ou serviço propriamente dita. Onde é concetrada toda regra de negocio, chamada para validação, e possíveis interações com outras entidades.
 

### Pré-requisitos (c/ docker):
[ ]  Docker
[ ] Conexão com a internet

### Pré-requisitos (nativo):
[ ] PHP >= 7.1 (mbstring, json)
[ ] Node >= 8.11
[ ] Composer
[ ] Git
[ ] zip, unzip

---

## Verificando conexão do Docker com a internet (passo a passo):
> Se estiver utilizando Linux(em uma rede corporativa com DNS proprío) o daemon do docker não recebe o DNS da rede corporativa com NAT, deve-se informar manualmente que você está em uma rede privada com DNS.
#### 1) Leia o conteudo do arquivo resolv.conf
```$cat /etc/resolv.conf```
#### 2) No final do arquivo você deverá ver algo parecido com isto:
```nameserver 192.168.56.1```
```search minhaempresa.com.br```
#### 3) Verifique se aparece o IP do servidor de DNS ou se consegue pingar utilizando o prefixo ```dns.``` antes da url da sua empresa. Exemplo: 
```$ping dns.minhaempresa.com.br```
#### 4) Com usuário root, navegue em ```/etc/docker/``` e crie um arquivo chamado ```daemon.json``` (se não existir).
```$sudo su```
```#cd /etc/docker/```
```#touch daemon.json```
#### 5) Edite o arquivo com seu editor de textos padrão, no meu caso, utilizo o vim:
```#vim daemon.json```
#### 6) Insira o seguinte conteúdo(substituindo o IP abaixo pelo IP de DNS que obteve acima):
```{```
``` 	"dns": [```
``` 		"192.168.56.100",```
``` 		"192.168.56.101"```
``` 	]```
 ```}```
#### 7) Reinicie o serviço do docker, lembre-se que irá reiniciar todos os seus containers ativos.
```#service docker restart (como root)```
```$sudo service docker restart (como sudo)```

#### 8) Para testar deverá fazer um curl, wget em uma página ou arquivo ou até mesmo um apt-get update. Testar com ICMP lhe retornará um falso positivo.
```$sudo docker run --rm -it ubuntu apt-get update```
ou
```#docker run --rm -it ubuntu apt-get update```

#### 10) Caso o retorno seja o update sem erros, o docker está com acesso a internet :) 

---

### O docker-compose.yml está configurado para usar as portas ```8888``` e ```8899``` sendo uma porta para API e outra porta para Documentação da API respectivamente. 

* ##### Caso essas portas estejam em uso basta alterar no arquivo docker-compose.yml na raiz do projeto. 
* ##### O docker foi configurado de forma mais estática e amarrada, para gerar a imagem pronta visto a necessidade de se aproximar a um ambiente de produção, a idéia é evoluir mais nesse sentido, automatizando o push pro hub utilizando CI/CD do GitLab por exemplo, utilizar imagens mais compactas e voltadas para desempenho, limpeza de cache e deixar o docker-compose pronto pra subir um kubernets sem precisar de muito esforço. Se for um ambiente poderá ser removido todo a parte de cópia de arquivos nos Dockerfiles e configurado volumes no docker-compose.yml. Está comentado no docker-compose.yml alguns exemplos. 
* ##### O projeto foi feito pra subir com docker mas se for o caso, pode constuir ele no seu ambiente local. Desde que tenha os pré-requisitos já relacionados acima.
#
##### Para rodar local, basta:
1) Instalar as dependências do composer:
```$composer install```

2) Gerar a documentação:
```$apidoc -i routes/ -o public/rest-api-docs```

3) Subir a aplicação com o servidor do PHP:
```$php -S localhost:8888 -t public```
```$php -S localhost:9999 -t public/rest-api-docs```

##### Para rodar com o docker, basta:
1) ```$sudo docker-compose up -d --build``` (como sudo)
ou
2) ```#docker-compose up -d --build```  (como root)

##### Os comentários, nomes de funções e variaveis estão em inglês.
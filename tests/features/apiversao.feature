# language: pt
Funcionalidade: versao do aplicativo
    Vejo a versao do aplicativo
    como um visitante
    acessando a pagina de versao
 
  Cenário: ver versao do aplicativo
  Dado Eu estou na página de entrada
  Quando Eu vou para "/menir/api?version" 
  Então Eu devo ver o texto que coincide com "0.0.6"
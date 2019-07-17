# WebService_PHP_ChatBot_GitHub
WebService desenvolvido em PHP para integração entre o chatbot (FlowXO) e o Github. Desenvolvido especialmente para o projeto SOS Brumadinho.

O chatbot foi construído para o primeiro contato entre um desenvolvedor voluntário e o projeto SOS Brumadinho. Havia sobrecarga da responsável 
do projeto, com mensagens repetitivas que poderiam, por exemplo, ser respondidas por um chatbot. A fim de manter as informações do bot sempre
atualizadas e devido a limitações tanto do chatbot quanto da API do GitHub foi necessário desenvolver um webservice que tratasse as informações
antes de exibi-las ao usuário.

RequestHTTP_GET.php - atende à requisições do tipo GET. Levanta, especificamente, todos os tópicos de todos os repositórios existentes na Organização
SOS Brumadinho para exibi-los como filtro para o usuário.
RequestHTTP_POST.php - atende à requisições do tipo POST. Recupera os repositórios com o tópico selecionado pelo usuário.

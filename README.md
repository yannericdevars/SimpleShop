Dans app/config/parameters.yml :

Mettre l'email de l'expéditeur : 

- email_sender: your@mail.com 



Dans app/config/config.yml :

Mettre les infos de l'expéditeur : 

- swiftmailer:
    transport: gmail
    username:  your@mail.com
    password:  yourPASSWORD



Aller voir dans le wiki pour les détails concernant le bundle

Pour me faire part de vos commentaires ou me contacter : yann-eric@live.fr


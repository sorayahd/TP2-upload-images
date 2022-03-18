# TP2-upload-images
ce tp a pour but de uploader des images,pour cela j'ai utilisé une base de données mysql sur phpMyadmin,pour connecter cette base au fichier php j'ai utiliser le fichier connexion;

Le fichier index quant à lui contient toute les étapes d'upload d'images jusqu'a stockage dans la base de données et l'affichage sur une page web,je n'ai pas effectué la pagination je ne savais pas que c'etait necessaire pour cette étape,
mais je l'appliquerai pour la prochaine étape.

Les seul extensions accceptées sont (jpg,png,jpeg) pour cela j'au utilisé la fonction explode() qui separe une chaine de caractere à partir d'un délimiteur pour recuperer 
l'extension à partir du nom de l'image,ensuite cette extension sera sauvgardé dans un tableau pour pouvoir les comparer au extensions autorisées,
d'une autre part ,je teste si la taille du fichier n'est pas assez grande avec que 40000 sinon l'image ne sera pas acceptée,
avec la fonction uniqid() je genere des nom unique pour chaque image pour qu'il y'ai pas de confusion si jamais y'a deux images avec un meme nom.
à la fin j'affiche les images depuis la base de données sur une passe web d'une facon vertical,car je n'ai pas encore reussi à faire l'affichage  grille.

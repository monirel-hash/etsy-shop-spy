# etsy-shop-spy-php

### this tool can give you informations about products on etsy by shop name

>This is a PHP script that uses the Etsy API to retrieve information about a store and its active listings. The user is prompted to enter a store name and an API key, which are then used to make requests to the Etsy API. The script then displays the shop name, shop creation date, and a table of information about the store's active listings, including the title, images, price, quantity, views, favorites, creation date, and tags. The script also includes some error handling for when the API key is not authorized or if the store name or API key fields are left empty.

HOW TO USE THIS TOOL ?

1 . You need api you can find it here https://www.etsy.com/developers/register

2 . Get your API and use it (api_key)

we use 3 Links to get infos from etsy

```
https://openapi.etsy.com/v2/shops/%s?includes=Listings:active&api_key=%s

https://openapi.etsy.com/v2/shops/%s/listings/active?&limit=100&api_key=%s

https://openapi.etsy.com/v2/listings/%s/images/?api_key=%s

```

NOW YOU READY TO GO RUN SCRIPT 

> ## Result :

<img width="1405" alt="Screen Shot 2023-01-24 at 7 51 40 PM" src="https://user-images.githubusercontent.com/110359866/214382780-92e8e80c-93e9-4ca7-9d16-557a6d5079b7.png">
 
 > ## Put the storename and your API:
 
 <img width="1435" alt="Screen Shot 2023-01-24 at 7 52 16 PM" src="https://user-images.githubusercontent.com/110359866/214382976-bd273f34-a74f-4109-88fb-fc1da6d40ca8.png">

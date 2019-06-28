# Zertegi

Udaleko Artxiboa kudeatzeko aplikazioa


 
Update JS Routing with

    sf fos:js-routing:dump --format=json --target=public/js/fos_js_routes.json  
   
    
     
     


Mysql-en egin beharreko aldaketak:

`ALTER TABLE amp ADD FULLTEXT fulltext_index (clasificacion, expediente, fecha, observaciones, signatura)`

`ALTER TABLE anarbe ADD FULLTEXT fulltex_index (clasificacion, expediente, fecha, observaciones, signatura)`

`ALTER TABLE argazki ADD FULLTEXT fulltex_index (barrutia, deskribapena, fecha, gaia, kolorea, neurria, oharrak, zenbakia)`

`ALTER TABLE ciriza ADD FULLTEXT fulltex_index (`data`,deskribapena,oharrak,sailkapena, signatura)`

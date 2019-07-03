# Zertegi

Udaleko Artxiboa kudeatzeko aplikazioa


 
Update JS Routing with

    sf fos:js-routing:dump --format=json --target=public/js/fos_js_routes.json  
   
    
     
     


Mysql-en egin beharreko aldaketak:

`ALTER TABLE amp ADD FULLTEXT fulltext_index (clasificacion, expediente, fecha, observaciones, signatura);`

`ALTER TABLE anarbe ADD FULLTEXT fulltex_index (clasificacion, expediente, fecha, observaciones, signatura);`

`ALTER TABLE argazki ADD FULLTEXT fulltex_index (barrutia, deskribapena, fecha, gaia, kolorea, neurria, oharrak, zenbakia);`

`ALTER TABLE ciriza ADD FULLTEXT fulltex_index (`data`,deskribapena,oharrak,sailkapena, signatura);`

`ALTER TABLE consultas ADD FULLTEXT fulltex_index (enpresa, gaia, helbidea, izena, kontsulta);`

`ALTER TABLE entradas ADD FULLTEXT fulltex_index (`data`, deskribapena, igorlea, signatura);`

`ALTER TABLE euskera ADD FULLTEXT fulltex_index (`data`, espedientea, oharrak, sailkapena, signatura);`

`ALTER TABLE gazteria ADD FULLTEXT fulltex_index (`data`, espedientea, oharrak, sailkapena, signatura);`

`ALTER TABLE hutsak ADD FULLTEXT fulltex_index (berria, egoera, signatura, zaharra);`

`ALTER TABLE kontratazioa ADD FULLTEXT fulltex_index (espedientea, sailkapena, signatura, urtea);`

`ALTER TABLE kultura ADD FULLTEXT fulltex_index (`data`, espedientea, oharrak, sailkapena, signatura);`

`ALTER TABLE liburuxka ADD FULLTEXT fulltex_index (azalpenak, `data`, deskribapena, signatura);`

`ALTER TABLE obratxikiak ADD FULLTEXT fulltex_index (espedientea, sailkapena, signatura, urtea);`

`ALTER TABLE pendientes ADD FULLTEXT fulltex_index (`data`,espedientea,signatura);`

`ALTER TABLE protokoloak  ADD FULLTEXT fulltex_index (artxiboa, bilatzaileak, `data`, datuak, eskribaua, laburpena, oharrak, saila, signatura);`

`ALTER TABLE salidas ADD FULLTEXT fulltex_index (eskatzailea, espedientea, irteera, sarrera, signatura);`

`ALTER TABLE tablas ADD FULLTEXT fulltex_index (fecha, observaciones, resolucion, serie, unidad);`

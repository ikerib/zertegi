# Zertegi

Udaleko Artxiboa kudeatzeko aplikazioa


 
  
   
    
     
     


Mysql-en egin beharreko aldaketak:

`ALTER TABLE amp ADD FULLTEXT fulltext_index (clasificacion, expediente, fecha, observaciones, signatura)`

`ALTER TABLE anarbe ADD FULLTEXT fulltex_index (clasificacion, expediente, fecha, observaciones, signatura)`

`ALTER TABLE argazki ADD FULLTEXT fulltex_index (barrutia, deskribapena, fecha, gaia, kolorea, neurria, oharrak, zenbakia)`



SELECT * FROM OBJEDNAVKA as obj LEFT JOIN HOST as h ON obj.host_id = h.id WHERE obj.zaplaceno IS NULL
--vráti hosťov a objednávku, ktorý ešte nezaplatili objednávku

SELECT rez.rezervace_od, rez.rezervace_do, rez.nastoueni, rez.odhlaseni, rez.pocet_osob, pok.kapacita, pok.popis FROM REZERVACE as rez INNER JOIN POKOJ as pok ON rez.pokoj_id =pok.id
--vrati info ku rezervacii, aky typ izba, kolko osob atd

SELECT * FROM VYKONANA_SLUZBA as vyks LEFT JOIN SLUZBA as s ON vyks.sluzba_id = s.id LEFT JOIN OBJEDNAVKA as o ON vyks.objednavka_id = o.vs
--vráti ku objednávka vykonané služby

SELECT AVG(pocet_osob) as premerny_pocet_osob FROM `REZERVACE` GROUP BY pokoj_id
--vrati priemerny pocet sob pre izby

SELECT SUM(konecna_cena) as sum_of_objednavka FROM `OBJEDNAVKA` GROUP BY MONTH(vytvoreni_objednavky), YEAR(vytvoreni_objednavky)
--suma objednavok za kazdy mesiac

SELECT * FROM REZERVACE WHERE EXISTS (SELECT * FROM POKOJ WHERE REZERVACE.pokoj_id = POKOJ.id);


SELECT * FROM OBJEDNAVKA WHERE vs IN (SELECT objednavka_id FROM VYKONANA_SLUZBA);
--objednávky, ktoré si objednali doplnkove služby


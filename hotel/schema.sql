-- autori: Trneny Josef xtrnen01, Denis Helienek xhelie00
-- IDS, projekt 2

DROP TABLE HOST CASCADE CONSTRAINT;
DROP TABLE OBJEDNAVKA CASCADE CONSTRAINT;
DROP TABLE REZERVACE CASCADE CONSTRAINT;
DROP TABLE SLUZBA CASCADE CONSTRAINT;
DROP TABLE VYKONANA_SLUZBA CASCADE CONSTRAINT;
DROP TABLE POKOJ CASCADE CONSTRAINT;

DROP SEQUENCE HOST_ID;
DROP SEQUENCE OBJEDNAVKA_ID;
DROP SEQUENCE SLUZBA_ID;
DROP SEQUENCE VYKONANA_SLUZBA_ID;
DROP SEQUENCE POKOJ_ID;
DROP SEQUENCE REZERVACE_ID;



CREATE TABLE HOST (
	id NUMBER NOT NULL,
	jmeno VARCHAR(20) NOT NULL,
	prijmeni VARCHAR(50) NOT NULL,
	datum_narozeni DATE NOT NULL,
	telefon NUMBER NOT NULL,
	email VARCHAR(50) NOT NULL,
	adresa VARCHAR(75) NOT NULL,
	CONSTRAINT host_id_primary PRIMARY KEY(id)
);

CREATE TABLE POKOJ (
	id NUMBER NOT NULL,
	kapacita NUMBER NOT NULL,
	cena_zakladni NUMBER NOT NULL,
	sezonni_priplatek NUMBER NOT NULL,
	sleva_pri_rezervaci NUMBER NOT NULL,
	popis VARCHAR(1000),
	CONSTRAINT pokoj_id_primary PRIMARY KEY(id)
);

CREATE TABLE SLUZBA (
	id NUMBER NOT NULL,
	nazev VARCHAR(50) NOT NULL,
	popis VARCHAR(200),
	cena NUMBER NOT NULL,
	CONSTRAINT sluzba_id_primary PRIMARY KEY (id)
);

CREATE TABLE OBJEDNAVKA (
	vs NUMBER NOT NULL,
	vytvoreni_objednavky DATE NOT NULL,
	zaplaceno DATE,
	platbu_prijal VARCHAR(60), -- zde by bylo vhodne pouzit ciselnik, pro zjednoduseni jsme jej vsak nevyuzili
	konecna_cena NUMBER,
  	host_id NUMBER NOT NULL,
	CONSTRAINT FK_objednavka_host_id FOREIGN KEY(host_id) REFERENCES HOST(id),
	CONSTRAINT objednavka_id_primary PRIMARY KEY(vs)
);

CREATE TABLE REZERVACE (
	id NUMBER NOT NULL,
	objednavka_id NUMBER NOT NULL,
	pokoj_id NUMBER NOT NULL,
	rezervace_od DATE NOT NULL,
	rezervace_do DATE NOT NULL,
	nastoueni DATE,
	odhlaseni DATE,
	pocet_osob NUMBER NOT NULL,
	zruseno NUMBER NOT NULL,
	CONSTRAINT rezerzave_id_primary PRIMARY KEY (id),
	CONSTRAINT FK_rezervace_objednavka_id FOREIGN KEY(objednavka_id) REFERENCES OBJEDNAVKA(vs),
	CONSTRAINT FK_rezervace_pokoj_id FOREIGN KEY(pokoj_id) REFERENCES POKOJ(id)
);

CREATE TABLE VYKONANA_SLUZBA (
	id NUMBER NOT NULL,
	sluzba_id NUMBER NOT NULL,
	objednavka_id NUMBER NOT NULL,
	CONSTRAINT FK_vyksluzba_sluzba_id FOREIGN KEY(sluzba_id) REFERENCES SLUZBA(id),
	CONSTRAINT FK_vyksluzba_objednavka_id FOREIGN KEY(objednavka_id) REFERENCES OBJEDNAVKA(vs),
	CONSTRAINT vykonana_sluzba_id_primary PRIMARY KEY (id)
);

CREATE SEQUENCE HOST_ID INCREMENT BY 1 START WITH 1;
CREATE SEQUENCE OBJEDNAVKA_ID INCREMENT BY 1 START WITH 1;
CREATE SEQUENCE REZERVACE_ID INCREMENT BY 1 START WITH 1;
CREATE SEQUENCE SLUZBA_ID INCREMENT BY 1 START WITH 1;
CREATE SEQUENCE VYKONANA_SLUZBA_ID INCREMENT BY 1 START WITH 1;
CREATE SEQUENCE POKOJ_ID INCREMENT BY 1 START WITH 1;



INSERT INTO SLUZBA VALUES(SLUZBA_ID.NEXTVAL, 'Uklid navic', '', 650);
INSERT INTO SLUZBA VALUES(SLUZBA_ID.NEXTVAL, 'Donaska zmrzliny', 'Donaska 2 porci zmrzliny v dezertnich miskach dle aktualni nabidky', 150);
INSERT INTO SLUZBA VALUES(SLUZBA_ID.NEXTVAL, 'Vymena rucniku navic', '', 50);
INSERT INTO SLUZBA VALUES(SLUZBA_ID.NEXTVAL, 'Snidane v restauracnim salonku', 'Snidane pro 2 osoby', 700);


INSERT INTO POKOJ VALUES(POKOJ_ID.NEXTVAL, 2, 1200, 200, 50, 'Manzelska postel, sprcha, televize, klimatizace' );
INSERT INTO POKOJ VALUES(POKOJ_ID.NEXTVAL, 2, 1200, 200, 50, 'Manzelska postel, sprcha, televize, klimatizace' );
INSERT INTO POKOJ VALUES(POKOJ_ID.NEXTVAL, 3, 1500, 250, 75, 'Manzelska postel, pristylka, vana, televize, klimatizace' );
INSERT INTO POKOJ VALUES(POKOJ_ID.NEXTVAL, 5, 5000, 850, 235, 'Apartma, manzelska postel, 3 oddelene, vana, sprcha, kuchyne, televize, klimatizace' );


INSERT INTO HOST VALUES( HOST_ID.NEXTVAL, 'Pavel', 'Koutn�', TO_DATE('30-03-1987', 'dd-mm-yyyy'), 391758340, 'pavel@koutny.cz', 'Koz� 29 Ostrava 47869');
INSERT INTO HOST VALUES( HOST_ID.NEXTVAL, 'Petr', 'Filip', TO_DATE('05-03-1987', 'dd-mm-yyyy'), 381284130, 'filip@ovci.cz','Ov�� 104 Brno 60200');
INSERT INTO HOST VALUES( HOST_ID.NEXTVAL, 'Old�ich', 'Bejr', TO_DATE('30-03-1967', 'dd-mm-yyyy'), 395012845, 'oldrich@seznam.cz', 'Havran� 90 Jakubov 39475');
INSERT INTO HOST VALUES( HOST_ID.NEXTVAL, 'Krist�na', 'Ko��', TO_DATE('08-01-1987', 'dd-mm-yyyy'), 891048723, 'vgfddf@centrum.cz', 'V�clavsk� n�m�st� 48 Rosice 29481');
INSERT INTO HOST VALUES( HOST_ID.NEXTVAL, 'Olga', 'Vr�blov�', TO_DATE('30-03-1954', 'dd-mm-yyyy'), 478365971, 'vrablova@seznam.cz', 'Masarykova 394 N�m욝 nad Oslavou 84723');



INSERT INTO OBJEDNAVKA VALUES(OBJEDNAVKA_ID.NEXTVAL, TO_DATE('05-03-2017 13:09', 'dd-mm-yyyy HH24:MI'), TO_DATE('06-03-2017 10:15', 'dd-mm-yyyy HH24:MI'), 'Standa', 1200, 3);
INSERT INTO OBJEDNAVKA VALUES(OBJEDNAVKA_ID.NEXTVAL, TO_DATE('05-03-2017 10:12', 'dd-mm-yyyy HH24:MI'), NULL, NULL, NULL, 1);
INSERT INTO OBJEDNAVKA VALUES(OBJEDNAVKA_ID.NEXTVAL, TO_DATE('26-02-2017', 'dd-mm-yyyy HH24:MI'), TO_DATE('03-03-2017 09:49', 'dd-mm-yyyy HH24:MI'), 'Kamila', 21450, 5);
INSERT INTO OBJEDNAVKA VALUES(OBJEDNAVKA_ID.NEXTVAL, TO_DATE('24-02-2017 21:58', 'dd-mm-yyyy HH24:MI'), NULL, NULL, NULL, 2);
INSERT INTO OBJEDNAVKA VALUES(OBJEDNAVKA_ID.NEXTVAL, TO_DATE('02-03-2017 17:01', 'dd-mm-yyyy HH24:MI'), TO_DATE('04-03-2017 07:23', 'dd-mm-yyyy HH24:MI'), 'Kamila', 3650, 4);

INSERT INTO REZERVACE VALUES(REZERVACE_ID.NEXTVAL, 1, 2, TO_DATE('05-03-2017 ', 'dd-mm-yyyy'), TO_DATE('06-03-2017', 'dd-mm-yyyy'), TO_DATE('05-03-2017 13:09', 'dd-mm-yyyy HH24:MI'), TO_DATE('06-03-2017 10:14', 'dd-mm-yyyy HH24:MI'), 2, 0 );
INSERT INTO REZERVACE VALUES(REZERVACE_ID.NEXTVAL, 2, 3, TO_DATE('06-04-2017', 'dd-mm-yyyy'), TO_DATE('08-04-2017', 'dd-mm-yyyy'), NULL, NULL, 2, 0 );
INSERT INTO REZERVACE VALUES(REZERVACE_ID.NEXTVAL, 3, 4, TO_DATE('28-02-2017', 'dd-mm-yyyy'), TO_DATE('03-03-2017', 'dd-mm-yyyy'), TO_DATE('28-03-2017 14:08', 'dd-mm-yyyy HH24:MI'), TO_DATE('03-03-2017 09:47', 'dd-mm-yyyy HH24:MI'), 3, 0 );
INSERT INTO REZERVACE VALUES(REZERVACE_ID.NEXTVAL, 4, 1, TO_DATE('01-03-2017', 'dd-mm-yyyy'), TO_DATE('02-03-2017', 'dd-mm-yyyy'), NULL, NULL, 2, 1 );
INSERT INTO REZERVACE VALUES(REZERVACE_ID.NEXTVAL, 5, 3, TO_DATE('02-03-2017', 'dd-mm-yyyy'), TO_DATE('04-03-2014', 'dd-mm-yyyy'), TO_DATE('02-03-2017 21:34', 'dd-mm-yyyy HH24:MI'), TO_DATE('04-03-2017 07:20', 'dd-mm-yyyy HH24:MI'), 1, 0 );


INSERT INTO VYKONANA_SLUZBA VALUES(VYKONANA_SLUZBA_ID.NEXTVAL, 1, 3);
INSERT INTO VYKONANA_SLUZBA VALUES(VYKONANA_SLUZBA_ID.NEXTVAL, 2, 3);
INSERT INTO VYKONANA_SLUZBA VALUES(VYKONANA_SLUZBA_ID.NEXTVAL, 1, 3);
INSERT INTO VYKONANA_SLUZBA VALUES(VYKONANA_SLUZBA_ID.NEXTVAL, 3, 5);



COMMIT;
BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "dicehistory" (
	"value"	INTEGER,
	"count"	INTEGER,
	"id"	INTEGER,
	"created_at"	TEXT,
	"updated_at"	TEXT
);
CREATE TABLE IF NOT EXISTS "handhistory" (
	"hand"	TEXT,
	"value"	INTEGER,
	"id"	INTEGER,
	"updated_at"	TEXT,
	"created_at"	TEXT
);
CREATE TABLE IF NOT EXISTS "score" (
	"score"	INTEGER,
	"name"	TEXT,
	"id"	INTEGER,
	"updated_at"	TEXT,
	"created_at"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "dicehistory" VALUES (1,10,1,NULL,NULL);
INSERT INTO "dicehistory" VALUES (2,10,2,NULL,NULL);
INSERT INTO "dicehistory" VALUES (3,10,3,NULL,NULL);
INSERT INTO "dicehistory" VALUES (4,10,4,NULL,NULL);
INSERT INTO "dicehistory" VALUES (5,10,5,NULL,NULL);
INSERT INTO "dicehistory" VALUES (6,10,6,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Ettor',10,1,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Tvåor',10,2,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Treor',10,3,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Fyror',10,4,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Femmor',10,5,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Sexor',10,6,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Par',10,7,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Tvåpar',10,8,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Tretal',10,9,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Fyrtal',10,10,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Kåk',10,11,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Liten stege',10,12,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Stor stege',10,13,NULL,NULL);
INSERT INTO "handhistory" VALUES ('Chans',10,14,NULL,NULL);
COMMIT;

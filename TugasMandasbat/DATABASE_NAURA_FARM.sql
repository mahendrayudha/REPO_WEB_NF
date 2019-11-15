/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     11/14/2019 10:38:30 AM                       */
/*==============================================================*/


drop table if exists OPSI_PEMBAYARAN;

drop table if exists OPSI_PENGIRIMAN;

drop table if exists PRODUK_BUAH;

drop table if exists PRODUK_OLAHAN;

drop table if exists STATUS;

drop table if exists TRANSAKSI;

drop table if exists USER;

/*==============================================================*/
/* Table: OPSI_PEMBAYARAN                                       */
/*==============================================================*/
create table OPSI_PEMBAYARAN
(
   ID_OPSI_PEMBAYARAN   varchar(3) not null,
   PEMBAYARAN           varchar(10),
   primary key (ID_OPSI_PEMBAYARAN)
);

/*==============================================================*/
/* Table: OPSI_PENGIRIMAN                                       */
/*==============================================================*/
create table OPSI_PENGIRIMAN
(
   ID_OPSI_PENGIRIMAN   varchar(3) not null,
   PENGIRIMAN           varchar(10),
   primary key (ID_OPSI_PENGIRIMAN)
);

/*==============================================================*/
/* Table: PRODUK_BUAH                                           */
/*==============================================================*/
create table PRODUK_BUAH
(
   ID_PRODUK_BUAH       varchar(3) not null,
   NAMA_PRODUK_BUAH     varchar(30),
   STOK_PRODUK_BUAH     int,
   HARGA_PRODUK_BUAH    int,
   primary key (ID_PRODUK_BUAH)
);

/*==============================================================*/
/* Table: PRODUK_OLAHAN                                         */
/*==============================================================*/
create table PRODUK_OLAHAN
(
   ID_PRODUK_OLAHAN     varchar(3) not null,
   NAMA_PRODUK_OLAHAN   varchar(30),
   STOK_PRODUK_OLAHAN   int,
   HARGA_PRODUK_OLAHAN  int,
   primary key (ID_PRODUK_OLAHAN)
);

/*==============================================================*/
/* Table: STATUS                                                */
/*==============================================================*/
create table STATUS
(
   ID_STATUS            varchar(3) not null,
   STATUS               varchar(5),
   primary key (ID_STATUS)
);

/*==============================================================*/
/* Table: TRANSAKSI                                             */
/*==============================================================*/
create table TRANSAKSI
(
   ID_TRANSAKSI         varchar(5) not null,
   ID_OPSI_PEMBAYARAN   varchar(3),
   ID_OPSI_PENGIRIMAN   varchar(3),
   ID_USER              varchar(5),
   ID_PRODUK_BUAH       varchar(3),
   ID_PRODUK_OLAHAN     varchar(3),
   TANGGAL_TRANSAKSI    datetime,
   JUMLAH_PRODUK        int,
   GRAND_TOTAL          integer,
   ALAMAT_PENGIRIMAN    varchar(100),
   primary key (ID_TRANSAKSI)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              varchar(5) not null,
   ID_STATUS            varchar(3),
   NAMA                 varchar(100),
   NOMOR_TELEPON        varchar(13),
   ALAMAT               varchar(150),
   EMAIL                varchar(50),
   USERNAME             varchar(20),
   PASSWORD             varchar(20),
   primary key (ID_USER)
);

alter table TRANSAKSI add constraint FK_MEMBAYAR foreign key (ID_OPSI_PEMBAYARAN)
      references OPSI_PEMBAYARAN (ID_OPSI_PEMBAYARAN) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_MEMBUAT foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_MENGIRIM foreign key (ID_OPSI_PENGIRIMAN)
      references OPSI_PENGIRIMAN (ID_OPSI_PENGIRIMAN) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_REFERENCE_7 foreign key (ID_PRODUK_BUAH)
      references PRODUK_BUAH (ID_PRODUK_BUAH) on delete restrict on update restrict;

alter table TRANSAKSI add constraint FK_REFERENCE_8 foreign key (ID_PRODUK_OLAHAN)
      references PRODUK_OLAHAN (ID_PRODUK_OLAHAN) on delete restrict on update restrict;

alter table USER add constraint FK_MEMILIKI foreign key (ID_STATUS)
      references STATUS (ID_STATUS) on delete restrict on update restrict;


CREATE TABLE adherents
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  address    VARCHAR(191) NULL,
  address_2  VARCHAR(191) NULL,
  city       VARCHAR(128) NULL,
  contact    VARCHAR(191) NULL,
  email      VARCHAR(191) NULL,
  email_copy VARCHAR(191) NULL,
  fax        VARCHAR(15)  NULL,
  manager    VARCHAR(191) NULL,
  name       VARCHAR(191) NULL,
  phone      VARCHAR(15)  NULL,
  state      VARCHAR(6)   NULL,
  web        VARCHAR(191) NULL,
  zip        VARCHAR(6)   NULL,
  created_at TIMESTAMP    NULL,
  updated_at TIMESTAMP    NULL,
  deleted_at TIMESTAMP    NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE banners
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  name       VARCHAR(191) NULL,
  created_at TIMESTAMP    NULL,
  updated_at TIMESTAMP    NULL,
  deleted_at TIMESTAMP    NULL,
  code       TEXT         NULL,
  visible    TINYINT      NULL,
  format     INT          NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE brands
(
  id               INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  description      TEXT         NULL,
  meta_description TEXT         NULL,
  meta_keywords    TEXT         NULL,
  meta_title       TEXT         NULL,
  ord              INT UNSIGNED NOT NULL,
  title            VARCHAR(255) NOT NULL,
  created_at       TIMESTAMP    NULL,
  updated_at       TIMESTAMP    NULL,
  deleted_at       TIMESTAMP    NULL,
  image            TEXT         NULL,
  slug             VARCHAR(191) NULL,
  CONSTRAINT brands_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE bread_templates
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  name       VARCHAR(191) NOT NULL,
  slug       VARCHAR(191) NOT NULL,
  view       TEXT         NULL,
  created_at TIMESTAMP    NULL,
  updated_at TIMESTAMP    NULL,
  CONSTRAINT bread_templates_name_unique
  UNIQUE (name),
  CONSTRAINT bread_templates_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE categories
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  parent_id  INT UNSIGNED    NULL,
  `order`    INT DEFAULT '1' NOT NULL,
  name       VARCHAR(191)    NOT NULL,
  slug       VARCHAR(191)    NOT NULL,
  created_at TIMESTAMP       NULL,
  updated_at TIMESTAMP       NULL,
  CONSTRAINT categories_slug_unique
  UNIQUE (slug),
  CONSTRAINT categories_parent_id_foreign
  FOREIGN KEY (parent_id) REFERENCES categories (id)
    ON UPDATE CASCADE
    ON DELETE SET NULL
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE INDEX categories_parent_id_foreign
  ON categories (parent_id);

CREATE TABLE data_rows
(
  id           INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  data_type_id INT UNSIGNED           NOT NULL,
  field        VARCHAR(191)           NOT NULL,
  type         VARCHAR(191)           NOT NULL,
  display_name VARCHAR(191)           NOT NULL,
  required     TINYINT(1) DEFAULT '0' NOT NULL,
  browse       TINYINT(1) DEFAULT '1' NOT NULL,
  `read`       TINYINT(1) DEFAULT '1' NOT NULL,
  edit         TINYINT(1) DEFAULT '1' NOT NULL,
  `add`        TINYINT(1) DEFAULT '1' NOT NULL,
  `delete`     TINYINT(1) DEFAULT '1' NOT NULL,
  details      TEXT                   NULL,
  `order`      INT DEFAULT '1'        NOT NULL
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE INDEX data_rows_data_type_id_foreign
  ON data_rows (data_type_id);

CREATE TABLE data_types
(
  id                    INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  name                  VARCHAR(191)           NOT NULL,
  slug                  VARCHAR(191)           NOT NULL,
  display_name_singular VARCHAR(191)           NOT NULL,
  display_name_plural   VARCHAR(191)           NOT NULL,
  icon                  VARCHAR(191)           NULL,
  model_name            VARCHAR(191)           NULL,
  policy_name           VARCHAR(191)           NULL,
  controller            VARCHAR(191)           NULL,
  description           VARCHAR(191)           NULL,
  generate_permissions  TINYINT(1) DEFAULT '0' NOT NULL,
  server_side           TINYINT DEFAULT '0'    NOT NULL,
  created_at            TIMESTAMP              NULL,
  updated_at            TIMESTAMP              NULL,
  CONSTRAINT data_types_name_unique
  UNIQUE (name),
  CONSTRAINT data_types_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

ALTER TABLE data_rows
  ADD CONSTRAINT data_rows_data_type_id_foreign
FOREIGN KEY (data_type_id) REFERENCES data_types (id)
  ON UPDATE CASCADE
  ON DELETE CASCADE;

CREATE TABLE departments
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  chief      VARCHAR(128) NULL,
  name       VARCHAR(128) NULL,
  visible    TINYINT      NULL,
  zip        VARCHAR(32)  NULL,
  gps        POINT        NULL,
  created_at TIMESTAMP    NULL,
  updated_at TIMESTAMP    NULL,
  deleted_at TIMESTAMP    NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE menu_items
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  menu_id    INT UNSIGNED                 NULL,
  title      VARCHAR(191)                 NOT NULL,
  url        VARCHAR(191)                 NOT NULL,
  target     VARCHAR(191) DEFAULT '_self' NOT NULL,
  icon_class VARCHAR(191)                 NULL,
  color      VARCHAR(191)                 NULL,
  parent_id  INT                          NULL,
  `order`    INT                          NOT NULL,
  created_at TIMESTAMP                    NULL,
  updated_at TIMESTAMP                    NULL,
  route      VARCHAR(191)                 NULL,
  parameters TEXT                         NULL
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE INDEX menu_items_menu_id_foreign
  ON menu_items (menu_id);

CREATE TABLE menus
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  name       VARCHAR(191) NOT NULL,
  created_at TIMESTAMP    NULL,
  updated_at TIMESTAMP    NULL,
  CONSTRAINT menus_name_unique
  UNIQUE (name)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

ALTER TABLE menu_items
  ADD CONSTRAINT menu_items_menu_id_foreign
FOREIGN KEY (menu_id) REFERENCES menus (id)
  ON DELETE CASCADE;

CREATE TABLE migrations
(
  id        INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  migration VARCHAR(191) NOT NULL,
  batch     INT          NOT NULL
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE pages
(
  id               INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  author_id        INT          NOT NULL,
  title            VARCHAR(191) NOT NULL,
  excerpt          TEXT         NULL,
  body             TEXT         NULL,
  image            VARCHAR(191) NULL,
  slug             VARCHAR(191) NOT NULL,
  meta_description TEXT         NULL,
  meta_keywords    TEXT         NULL,
  status           VARCHAR(255) NOT NULL,
  created_at       TIMESTAMP    NULL,
  updated_at       TIMESTAMP    NULL,
  template         VARCHAR(255) NULL,
  CONSTRAINT pages_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE password_resets
(
  email      VARCHAR(191) NOT NULL,
  token      VARCHAR(191) NOT NULL,
  created_at TIMESTAMP    NULL
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE INDEX password_resets_email_index
  ON password_resets (email);

CREATE TABLE permission_groups
(
  id   INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  name VARCHAR(191) NOT NULL,
  CONSTRAINT permission_groups_name_unique
  UNIQUE (name)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE permission_role
(
  permission_id INT UNSIGNED NOT NULL,
  role_id       INT UNSIGNED NOT NULL,
  PRIMARY KEY (permission_id, role_id)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE INDEX permission_role_permission_id_index
  ON permission_role (permission_id);

CREATE INDEX permission_role_role_id_index
  ON permission_role (role_id);

CREATE TABLE permissions
(
  id                  INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  `key`               VARCHAR(191) NOT NULL,
  table_name          VARCHAR(191) NULL,
  created_at          TIMESTAMP    NULL,
  updated_at          TIMESTAMP    NULL,
  permission_group_id INT UNSIGNED NULL
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE INDEX permissions_key_index
  ON permissions (`key`);

ALTER TABLE permission_role
  ADD CONSTRAINT permission_role_permission_id_foreign
FOREIGN KEY (permission_id) REFERENCES permissions (id)
  ON DELETE CASCADE;

CREATE TABLE posts
(
  id               INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  author_id        INT                                                    NOT NULL,
  category_id      INT                                                    NULL,
  title            VARCHAR(191)                                           NOT NULL,
  seo_title        VARCHAR(191)                                           NULL,
  excerpt          TEXT                                                   NULL,
  body             TEXT                                                   NOT NULL,
  image            VARCHAR(191)                                           NULL,
  slug             VARCHAR(191)                                           NOT NULL,
  meta_description TEXT                                                   NULL,
  meta_keywords    TEXT                                                   NULL,
  status           ENUM ('PUBLISHED', 'DRAFT', 'PENDING') DEFAULT 'DRAFT' NOT NULL,
  featured         TINYINT(1) DEFAULT '0'                                 NOT NULL,
  created_at       TIMESTAMP                                              NULL,
  updated_at       TIMESTAMP                                              NULL,
  CONSTRAINT posts_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE product_categories
(
  id               INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  name             VARCHAR(191) NOT NULL,
  created_at       TIMESTAMP    NULL,
  updated_at       TIMESTAMP    NULL,
  deleted_at       TIMESTAMP    NULL,
  description      TEXT         NULL,
  fullname         VARCHAR(191) NULL,
  image_alt        VARCHAR(191) NULL,
  meta_description VARCHAR(191) NULL,
  meta_keywords    VARCHAR(191) NULL,
  meta_title       VARCHAR(191) NULL,
  parent_id        INT          NULL,
  slug             VARCHAR(191) NOT NULL,
  image            VARCHAR(191) NULL,
  grip             TEXT         NULL,
  CONSTRAINT product_categories_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE products
(
  id                  INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  brand_id            INT          NULL,
  category_id         INT          NULL,
  description         TEXT         NULL,
  ecotaxe             VARCHAR(191) NULL,
  grip                TEXT         NULL,
  images              TEXT         NULL,
  secondary_images    TEXT         NULL,
  image_alt           VARCHAR(191) NULL,
  meta_description    TEXT         NULL,
  meta_keywords       TEXT         NULL,
  meta_title          VARCHAR(191) NULL,
  more_1              TEXT         NULL,
  more_2              TEXT         NULL,
  more_3              TEXT         NULL,
  on_home             INT          NULL,
  price               VARCHAR(191) NULL,
  reference           VARCHAR(191) NULL,
  title               VARCHAR(191) NULL,
  type                VARCHAR(191) NULL,
  univers             VARCHAR(191) NULL,
  visible             INT          NULL,
  slug                VARCHAR(191) NOT NULL,
  created_at          TIMESTAMP    NULL,
  updated_at          TIMESTAMP    NULL,
  deleted_at          TIMESTAMP    NULL,
  year_of_manufacture VARCHAR(10)  NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE INDEX products_slug_index
  ON products (slug);

CREATE TABLE roles
(
  id           INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  name         VARCHAR(191) NOT NULL,
  display_name VARCHAR(191) NOT NULL,
  created_at   TIMESTAMP    NULL,
  updated_at   TIMESTAMP    NULL,
  CONSTRAINT roles_name_unique
  UNIQUE (name)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

ALTER TABLE permission_role
  ADD CONSTRAINT permission_role_role_id_foreign
FOREIGN KEY (role_id) REFERENCES roles (id)
  ON DELETE CASCADE;

CREATE TABLE settings
(
  id           INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  `key`        VARCHAR(191)    NOT NULL,
  display_name VARCHAR(191)    NOT NULL,
  value        TEXT            NOT NULL,
  details      TEXT            NULL,
  type         VARCHAR(191)    NOT NULL,
  `order`      INT DEFAULT '1' NOT NULL,
  `group`      VARCHAR(191)    NULL,
  CONSTRAINT settings_key_unique
  UNIQUE (`key`)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE slide_shows
(
  id                 INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  btn_link           VARCHAR(191) NOT NULL,
  created_at         TIMESTAMP    NULL,
  updated_at         TIMESTAMP    NULL,
  deleted_at         TIMESTAMP    NULL,
  btn_name           VARCHAR(191) NOT NULL,
  image              TEXT         NULL,
  image_alt          VARCHAR(191) NULL,
  `order`            INT          NULL,
  sub_title          VARCHAR(191) NOT NULL,
  title              VARCHAR(191) NOT NULL,
  title_image_min    VARCHAR(191) NULL,
  thumbnail          TEXT         NULL,
  inactive_thumbnail TEXT         NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE solutions
(
  id                 INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  class_menu         VARCHAR(191) NULL,
  keywords           TEXT         NULL,
  name               VARCHAR(255) NOT NULL,
  parent_solution_id INT          NULL,
  solution_order     INT          NULL,
  title              VARCHAR(191) NULL,
  trend_edito        TEXT         NULL,
  visible_menu       INT          NULL,
  slug               VARCHAR(191) NOT NULL,
  created_at         TIMESTAMP    NULL,
  updated_at         TIMESTAMP    NULL,
  deleted_at         TIMESTAMP    NULL,
  images             TEXT         NULL,
  CONSTRAINT solutions_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE store_brands
(
  id       INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  brand_id INT NULL,
  store_id INT NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE store_photos
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  title      TEXT            NULL,
  images     TEXT            NULL,
  `order`    INT DEFAULT '0' NULL,
  created_at TIMESTAMP       NULL,
  updated_at TIMESTAMP       NULL,
  deleted_at TIMESTAMP       NULL,
  store_id   INT             NOT NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE stores
(
  id                    INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  address               VARCHAR(191)        NULL,
  created_at            TIMESTAMP           NULL,
  updated_at            TIMESTAMP           NULL,
  deleted_at            TIMESTAMP           NULL,
  gps                   POINT               NULL,
  address_2             VARCHAR(191)        NULL,
  adherent_id           BIGINT DEFAULT '0'  NULL,
  alt_list_link         VARCHAR(191)        NULL,
  alt_url               VARCHAR(64)         NULL,
  city                  VARCHAR(128)        NULL,
  contact               VARCHAR(191)        NULL,
  description           TEXT                NULL,
  email                 VARCHAR(191)        NULL,
  email_copy            VARCHAR(191)        NULL,
  fax                   VARCHAR(15)         NULL,
  gift_coupon_prefix    VARCHAR(32)         NULL,
  grip                  TEXT                NULL,
  hourly                TEXT                NULL,
  is_expo               INT                 NULL,
  manager               VARCHAR(191)        NULL,
  meta_description      TEXT                NULL,
  meta_keywords         TEXT                NULL,
  meta_title            VARCHAR(191)        NULL,
  name                  VARCHAR(191)        NULL,
  news_show             TINYINT DEFAULT '0' NULL,
  news_title            VARCHAR(64)         NULL,
  phone                 VARCHAR(15)         NULL,
  quote_author          VARCHAR(64)         NULL,
  quote_author_function VARCHAR(64)         NULL,
  quote_text            TEXT                NULL,
  services              TEXT                NULL,
  show_gift_coupon_form TINYINT             NULL,
  solutions             BIGINT DEFAULT '0'  NULL,
  state                 VARCHAR(6)          NULL,
  web                   VARCHAR(191)        NULL,
  zip                   VARCHAR(6)          NULL,
  logo                  TEXT                NULL,
  wide                  TEXT                NULL,
  news_image            TEXT                NULL,
  quote_author_image    TEXT                NULL,
  slug                  VARCHAR(191)        NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE translations
(
  id          INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  table_name  VARCHAR(191) NOT NULL,
  column_name VARCHAR(191) NOT NULL,
  foreign_key INT UNSIGNED NOT NULL,
  locale      VARCHAR(191) NOT NULL,
  value       TEXT         NOT NULL,
  created_at  TIMESTAMP    NULL,
  updated_at  TIMESTAMP    NULL,
  CONSTRAINT translations_table_name_column_name_foreign_key_locale_unique
  UNIQUE (table_name, column_name, foreign_key, locale)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE trends
(
  id               INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  title            VARCHAR(191) NOT NULL,
  slug             VARCHAR(191) NOT NULL,
  created_at       TIMESTAMP    NULL,
  updated_at       TIMESTAMP    NULL,
  deleted_at       TIMESTAMP    NULL,
  description      TEXT         NULL,
  feature          TEXT         NULL,
  image_alt        VARCHAR(191) NULL,
  meta_description TEXT         NULL,
  meta_keywords    TEXT         NULL,
  meta_title       VARCHAR(191) NULL,
  mini_description TEXT         NULL,
  reference        VARCHAR(191) NULL,
  solution_id      INT          NOT NULL,
  status           INT          NULL,
  images           TEXT         NULL,
  logo             TEXT         NULL,
  image_carousel   TEXT         NULL,
  image_listing    TEXT         NULL,
  publication_at   DATETIME     NULL,
  CONSTRAINT trends_slug_unique
  UNIQUE (slug)
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;

CREATE TABLE users
(
  id             INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  role_id        INT                                      NULL,
  name           VARCHAR(191)                             NOT NULL,
  email          VARCHAR(191)                             NOT NULL,
  avatar         VARCHAR(191) DEFAULT 'users/default.png' NULL,
  password       VARCHAR(191)                             NOT NULL,
  remember_token VARCHAR(100)                             NULL,
  created_at     TIMESTAMP                                NULL,
  updated_at     TIMESTAMP                                NULL,
  CONSTRAINT users_email_unique
  UNIQUE (email)
)
  ENGINE = InnoDB
  COLLATE = utf8mb4_unicode_ci;

CREATE TABLE vouchers
(
  id         INT UNSIGNED AUTO_INCREMENT
    PRIMARY KEY,
  store_id   INT       NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  deleted_at TIMESTAMP NULL
)
  ENGINE = InnoDB
  COLLATE = utf8_unicode_ci;



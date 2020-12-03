create table `user` (
  id bigint AUTO_INCREMENT primary key,
  uid varchar(128) not null default '' comment '用户id',
  name varchar(128) not null default '' comment '用户名',
  pass varchar(128) not null default '' comment '用户密码',
  level int not null default 0 comment '用户级别',
  forbidden int not null default 0 comment '是否禁用， 0：非禁用， 1： 禁用',
  created_at TIMESTAMP not null default CURRENT_TIMESTAMP comment '创建时间',
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  deleted_at TIMESTAMP null comment '删除时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `article` (
  id bigint AUTO_INCREMENT primary key,
  title varchar(128) not null default '' comment '文章标题',
  creator_id varchar(128) not null default '' comment '创作者id',
  read_count int not null default 0 comment '阅读次数',
  image varchar(256) not null default '' comment '封面图',
  weight int not null default 0 comment '权重， 0： 正常， 100： 置顶',
  content text comment '文章内容',
  source varchar(128) not null default '' comment '文章来源',
  menu int not null default 0 comment '文章所属类别',
  draft int not null default 0 comment '是否草稿 0：草稿， 1：非草稿',
  forbidden int not null default 0 comment '是否禁用， 0：非禁用， 1： 禁用',
  created_at TIMESTAMP not null default CURRENT_TIMESTAMP comment '创建时间',
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  deleted_at TIMESTAMP null comment '删除时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `menu` (
  id bigint AUTO_INCREMENT primary key,
  name varchar(128) not null default '' comment '分类名称',
  des varchar(256) not null default '' comment '分类描述',
  forbidden int not null default 0 comment '是否禁用， 0：非禁用， 1： 禁用',
  created_at TIMESTAMP not null default CURRENT_TIMESTAMP comment '创建时间',
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  deleted_at TIMESTAMP null comment '删除时间'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

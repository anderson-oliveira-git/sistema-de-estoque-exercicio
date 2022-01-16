create table produtos (
	id_produto serial not null primary key,
	produto varchar(50),
	preco numeric(3, 2),
	data_cadastro date,
	validade date, 
	quantidade integer, 
	descricao varchar(50)
);
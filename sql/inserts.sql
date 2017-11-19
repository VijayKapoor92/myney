select * from usuario;
select * from conta;
select * from categoria_grupo;
select * from categoria;
select * from movimentacao;

insert into usuario
(nm_usuario, nm_email_usuario, nr_senha_usuario)
values
('Vijay Lopes Kapoor', 'vijaylopeskapoor@gmail.com', md5('x'));

insert into conta
(nm_conta, vl_conta, usuario_id_usuario)
values
('Itaú', 0.00, 1);

insert into categoria_grupo
(nm_categoria_grupo)
values
('Gastos essenciais'),
('Estilo de vida'),
('Empréstimos'),
('Lançamentos entre contas'),
('Renda'),
('Não classificado');

insert into categoria
(nm_categoria, categoria_grupo_id_categoria_grupo)
values
('Moradia', 1),
('Contas residenciais', 1),
('Saúde', 1),
('Educação', 1),
('Transporte', 1),
('Mercado', 1),
('Empregados domésticos', 2),
('TV / Internet / Telefone', 2),
('Taxas bancãrias', 2),
('Saques', 2),
('Bares / Restaurantes', 2),
('Lazer', 2),
('Compras', 2),
('Cuidados pessoais', 2),
('Serviços', 2),
('Viagem', 2),
('Presentes / Doaçōes', 2),
('Família / Filhos', 2),
('Despesas do trabalho', 2),
('Outros gastos', 2),
('Impostos', 2),
('Juros de cartão', 3),
('Crediário', 3),
('Cheque especial', 3),
('Crédito consignado', 3),
('Carnê', 3),
('Outros empréstimos', 3),
('Juros', 3),
('Pagamento de cartão', 4),
('Resgate', 4),
('Aplicação', 4),
('Transferência', 4),
('Remuneração', 5),
('Bônus', 5),
('Rendimento', 5),
('Outras rendas', 5),
('Empréstimo', 5),
('Classificar', 6);

insert into movimentacao
(tp_movimentacao, categoria_id_categoria, tp_pagamento, nm_movimentacao, vl_movimentacao, dt_movimentacao, dt_cadastro)
values
(1, 33, 1, 'Salário', 0.00, 20171107, sysdate());

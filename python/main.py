def calcular_casas_compradas(X, I, B):

  preco_medio_por_casa = I / X

  casas_compradas = int(B // preco_medio_por_casa)

  casas_compradas = min(casas_compradas, X)

  valor_gasto = casas_compradas * preco_medio_por_casa

  return casas_compradas, valor_gasto


X = 10
I = 500000
B = 300000

casas_compradas, valor_gasto = calcular_casas_compradas(X, I, B)

print(f"Quantidade de casas que puderam ser compradas: {casas_compradas}")
print(f"Valor total gasto: R${valor_gasto:.2f}")

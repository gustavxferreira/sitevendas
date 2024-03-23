<?php
function execBind($conexao, $sql, $parametros = [])
{
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $conexao->error);
    }

    if (!empty($parametros)) {

        $tipos = '';
        foreach ($parametros as $parametro) {
            if (is_int($parametro)) {
                $tipos .= 'i';
            } elseif (is_double($parametro)) {
                $tipos .= 'd';
            } else {
                $tipos .= 's';
            }
        }


        $bindParams = array_merge([$tipos], $parametros);


        call_user_func_array([$stmt, 'bind_param'], $bindParams);
    }

    $stmt->execute();

    if ($stmt->error) {
        die('Erro na execução da consulta: ' . $stmt->error);
    }

    $resultado = $stmt->get_result();

    $stmt->close();

    return $resultado;
}


function execBindM($conexao, $sql, $parametros = [])
{
    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $conexao->error);
    }

    if (!empty($parametros)) {
        $tipos = '';
        $bindParams = [];

        foreach ($parametros as $parametro) {
            if (is_int($parametro)) {
                $tipos .= 'i';
            } elseif (is_double($parametro)) {
                $tipos .= 'd';
            } else {
                $tipos .= 's';
            }

            $bindParams[] = &$parametro;
        }

        array_unshift($bindParams, $tipos);


        call_user_func_array([$stmt, 'bind_param'], $bindParams);
    }

    $stmt->execute();

    if ($stmt->error) {
        die('Erro na execução da consulta: ' . $stmt->error);
    }

    $resultado = $stmt->get_result();

    $stmt->close();

    return $resultado;
}

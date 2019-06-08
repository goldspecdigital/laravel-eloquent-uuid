<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude([
        'media',
        'tests',
        'vendor',
    ]);

$rules = [
    '@PSR1' => true,
    '@PSR2' => true,

    'align_multiline_comment' => true,
    'array_indentation' => true,
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
        'statements' => ['return', 'throw'],
    ],
    'cast_spaces' => [
        'space' => 'none',
    ],
    'class_attributes_separation' => [
        'elements' => ['method', 'property'],
    ],
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'compact_nullable_typehint' => true,
    'concat_space' => [
        'spacing' => 'one',
    ],
    'declare_equal_normalize' => true,
    'declare_strict_types' => true,
    'ereg_to_preg' => true,
    'fully_qualified_strict_types' => true,
    'function_to_constant' => true,
    'function_typehint_space' => true,
    'heredoc_indentation' => true,
    'heredoc_to_nowdoc' => true,
    'list_syntax' => true,
    'logical_operators' => true,
    'lowercase_cast' => true,
    'lowercase_static_reference' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'mb_str_functions' => true,
    'method_chaining_indentation' => true,
    'modernize_types_casting' => true,
    'multiline_comment_opening_closing' => true,
    'multiline_whitespace_before_semicolons' => true,
    'native_function_casing' => true,
    'native_function_type_declaration_casing' => true,
    'new_with_braces' => true,
    'no_alias_functions' => true,
    'no_alternative_syntax' => true,
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_break_comment' => [
        'comment_text' => 'No break.',
    ],
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_extra_blank_lines' => true,
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print' => true,
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_php4_constructor' => true,
    'no_short_bool_cast' => true,
    'no_short_echo_tag' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_spaces_around_offset' => true,
    'no_unused_imports' => true,
    'no_whitespace_before_comma_in_array' => true,
    'no_whitespace_in_blank_line' => true,
    'normalize_index_brace' => true,
    'object_operator_without_whitespace' => true,
    'ordered_imports' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_align' => [
        'align' => 'left',
    ],
    'phpdoc_annotation_without_dot' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_empty_return' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_scalar' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => true,
    'phpdoc_trim' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_types' => true,
    'phpdoc_types_order' => [
        'null_adjustment' => 'always_last',
        'sort_algorithm' => 'none',
    ],
    'phpdoc_var_annotation_correct_order' => true,
    'phpdoc_var_without_name' => true,
    'random_api_migration' => true,
    'return_type_declaration' => true,
    'semicolon_after_instruction' => true,
    'set_type_to_cast' => true,
    'short_scalar_cast' => true,
    'simple_to_complex_string_variable' => true,
    'simplified_null_return' => true,
    'single_blank_line_before_namespace' => true,
    'single_line_comment_style' => true,
    'single_quote' => true,
    'single_trait_insert_per_statement' => true,
    'standardize_not_equals' => true,
    'ternary_operator_spaces' => true,
    'ternary_to_null_coalescing' => true,
    'trailing_comma_in_multiline_array' => true,
    'trim_array_spaces' => true,
    'unary_operator_spaces' => true,
];

return Config::create()
    ->setRules($rules)
    ->setFinder($finder);

<?php

namespace Drupal\chart_block_example\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ChartsBlock' block.
 *
 * @Block(
 *  id = "charts_block",
 *  admin_label = @Translation("Charts block"),
 * )
 */
class ChartsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $options = [];

    $options['type'] = 'column';
    $options['title'] = $this->t('Age distribution');

    $options['yaxis_title'] = $this->t('Number of players');
    $options['xaxis_title'] = $this->t('Ages');

    $options['yaxis_min'] = '';
    $options['yaxis_max'] = '';

    // TODO Google specific options...
    $options['legend'] = 'none';

    // Sample data format.
    $categories = [
      '14 yo',
      '15 yo',
      '16 yo',
      '17 yo',
      '18 yo',
      '19 yo',
    ];

    $seriesData = [
      [
        'name'  => 'Number of players',
        'color' => '#0d233a',
        'data'  => [50, 60, 100, 132, 133, 234]
      ],
    ];

    $build = [
      '#theme'      => 'chart_block_example',
      '#library'    => 'google',
      '#categories' => $categories,
      '#seriesData' => $seriesData,
      '#options'    => $options,
    ];

    return $build;
  }

}

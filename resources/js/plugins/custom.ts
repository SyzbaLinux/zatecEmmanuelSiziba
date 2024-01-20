import { h } from 'vue';
import type { IconSet, IconAliases, IconProps } from 'vuetify';

const aliases = {
    radioOn: 'ph-check-circle',
    radioOff: 'ph-circle',
    collapse: 'ph-caret-up',
    complete: 'ph-check-circle',
    cancel: 'ph-x',
    close: 'ph-x',
    delete: 'ph-trash-simple',
    clear: 'ph-x',
    success: 'ph-check',
    info: 'ph-info',
    warning: 'ph-warning-circle',
    error: 'ph-x-circle',
    prev: 'ph-caret-left',
    next: 'ph-caret-right',
    checkboxOn: 'ph-check-square',
    checkboxOff: 'ph-square',
    checkboxIndeterminate: '...',
    delimiter: 'ph-circle',
    sort: 'ph-caret-up',
    expand: 'ph-caret-down',
    menu: 'ph-list',
    subgroup: 'ph-caret-down',
    dropdown: 'ph-caret-down',
    edit: 'ph-pencil-simple',
    ratingEmpty: 'ph-star',
    ratingFull: 'ph-fill ph-star',
    ratingHalf: 'ph-star-half',
    loading: '...',
    first: '...',
    last: '...',
    unfold: '...',
    file: 'ph-paperclip',
    plus: 'ph-plus',
    minus: 'ph-minus',
}

const phospor: IconSet = {
    component: (props: IconProps) => h(props.tag, { class: ['ph', props.icon] }),
};

export { aliases, phospor };

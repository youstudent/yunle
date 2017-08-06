/**
 * Created by harlen-angkemac on 2017/7/14.
 */
window.Parsley
    .addValidator('multipleOf', {
        requirementType: 'integer',
        validateNumber: function(value, requirement) {
            return 0 === value % requirement;
        },
        messages: {
            en: 'This value should be a multiple of %s',
            fr: 'Cette valeur doit être un multiple de %s'
        }
    });